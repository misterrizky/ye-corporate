<?php

namespace App\Http\Controllers\Office;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\HRM\Employee;
use Illuminate\Http\Request;
use App\Models\Master\UserVerify;
use App\Http\Controllers\Controller;
use App\Models\Master\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Models\HRM\EmployeeAttendance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VerificationNotification;
use App\Notifications\Attendance\InNotification;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\Attendance\OutNotification;
use App\Notifications\PasswordChangedNotification;
use App\Notifications\RegisteredEmployeeNotification;
use App\Notifications\RegistrationEmployeeNotification;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employees')->except('do_logout');
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.auth.main');
        }
        return view('pages.office.auth.theme');
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if(Auth::guard('employees')->attempt(['email' => $request->email, 'password' => $request->password, 'st' => 'a'], $request->remember))
        {
            $cek = EmployeeAttendance::where('employee_id', Auth::guard('employees')->user()->id)->whereRaw('DATE(presence_at) = CURDATE()')->first();
            if(!$cek){
                $absen = new EmployeeAttendance;
                $absen->employee_id = Auth::guard('employees')->user()->id;
                $absen->presence_at = date('Y-m-d H:i:s');
                $absen->save();
            }
            $user = Auth::guard('employees')->user();
            Employee::where('id', Auth::guard('employees')->user()->id)->update(['last_seen' => Carbon::now()]);
            $allEmployee = Employee::where('id','!=', Auth::guard('employees')->user()->id)->get();
            foreach($allEmployee as $e){
                if(Cache::has('is_employee_online'. $e->id) == 1){
                    Notification::send($e, new InNotification($e,$user));
                }
            }
            return response()->json([
                'alert' => 'success',
                'message' =>  'Welcome back '. Auth::guard('employees')->user()->name,
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
    public function register(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.auth.register');
        }
        return view('pages.office.auth.theme');
    }
    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first' => 'required',
            'last' => 'required',
            'phone' => 'required|unique:employees|min:9|max:13',
            'email' => 'required|email|unique:employees',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('first')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('first'),
                ]);
            }elseif ($errors->has('last')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('last'),
                ]);
            }elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }elseif ($errors->has('password_confirmation')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password_confirmation'),
                ]);
            }
        }
        $employee = new Employee;
        $employee->name = Str::title($request->first) . ' ' . Str::title($request->last);
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->department_id = 0;
        $employee->position_id = 0;
        $employee->st = 'a';
        $employee->password = Hash::make($request->password);
        $employee->save();
        $token = Str::random(64);
        $recepient = Employee::whereIn('position_id',[4,6,13,17])->get();
        foreach($recepient as $r){
            Notification::send($r, new RegisteredEmployeeNotification($employee));
        }
        UserVerify::create([
            'employee_id' => $employee->id,
            'token' => $token
        ]);
        Notification::send($employee, new RegistrationEmployeeNotification($employee, $token));
        return response()->json([
            'alert' => 'success',
            'message' => 'Thanks for join us '. Str::title($request->first) . ' ' . Str::title($request->last),
            'callback' => 'auth',
            'route' => route('office.auth.index'),
        ]);
    }
    public function do_verify($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $employee = $verifyUser->employee;

            if (!$employee->email_verified_at) {
                $verifyUser->employee->email_verified_at = date("Y-m-d H:i:s");
                $verifyUser->employee->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('office.auth.index')->with('message', $message);
    }
    public function forgot(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.auth.forgot');
        }
        return view('pages.office.auth.theme');
    }
    public function do_forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:employees',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }
        }
        $employee = Employee::where('email',$request->email)->first();

        $token = Str::random(64);
        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $data = array(
            'token' => $token,
            'employee' => $employee
        );
        Notification::send($data['employee'], new ResetPasswordNotification($data));
        return response()->json([
            'alert' => 'success',
            'message' => 'We have e-mailed your password reset link!',
            'callback' => 'auth',
            'route' => route('office.auth.index'),
        ]);
    }
    public function reset(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.auth.reset');
        }
        return view('pages.office.auth.theme');
    }
    public function do_reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|exists:password_resets',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('token')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('token'),
                ]);
            } elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            } elseif ($errors->has('password_confirmation')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password_confirmation'),
                ]);
            }
        }
        $updatePassword = PasswordReset::where(['token' => $request->token])->first();
        if (!$updatePassword) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Invalid token!',
            ]);
        }
        Employee::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);
        $users = Employee::where('email', $updatePassword->email)->first();
        PasswordReset::where(['email' => $updatePassword->email])->delete();
        Notification::send($users, new PasswordChangedNotification($users));
        return response()->json([
            'alert' => 'success',
            'message' => 'Your password has been changed!',
            'callback' => 'auth',
            'route' => route('office.auth.index'),
        ]);
    }
    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function google_callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = Employee::where('google_id', $user->id)->first();
            if($finduser){
                Auth::guard('employees')->login($finduser, true);
                return redirect()->route('office.dashboard');
            }else{
                $newUser = Employee::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'department_id'=> 0,
                    'position_id'=> 0,
                    'st'=> 'a',
                    'password' => Hash::make('password')
                ]);
                $token = Str::random(64);

                UserVerify::create([
                    'employee_id' => $newUser->id,
                    'token' => $token
                ]);
                Notification::send($newUser, new RegistrationEmployeeNotification($newUser, $token));
                Auth::guard('employees')->login($newUser, true);
                // return redirect()->intended('dashboard');
                return redirect()->route('office.dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route('office.auth.index');
        }
    }
    public function resend_mail()
    {
        $users = Employee::where('id', Auth::user()->id)->first();
        $token = Str::random(64);
        UserVerify::create([
            'employee_id' => $users->id,
            'token' => $token
        ]);
        Notification::send($users, new VerificationNotification($users, $token));
        return response()->json([
            'alert' => 'info',
            'message' => 'We have resend activation to your email'
        ]);
    }
    public function do_logout()
    {
        $user = Auth::guard('employees')->user();
        Employee::where('id', Auth::guard('employees')->user()->id)->update(['last_seen' => Carbon::now()]);
        $allEmployee = Employee::where('id','!=', $user->id)->get();
        foreach($allEmployee as $e){
            if(Cache::has('is_employee_online'. $e->id) == 1){
                Notification::send($e, new OutNotification($e,$user));
            }
        }
        $cek = EmployeeAttendance::where('employee_id', Auth::guard('employees')->user()->id)->whereRaw('DATE(presence_at) = CURDATE()')->first();
        $cek->finish_at = date('Y-m-d H:i:s');
        $cek->update();
        $employee = Auth::guard('employees')->user();
        Auth::logout($employee);
        return redirect()->route('office.auth.index');
    }
}

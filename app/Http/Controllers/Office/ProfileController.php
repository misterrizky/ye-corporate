<?php

namespace App\Http\Controllers\Office;

use App\Models\HRM\Employee;
use Illuminate\Http\Request;
use App\Models\Regional\Province;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.overview.main');
        }
        return view('pages.office.theme');
    }
    public function overview()
    {
        return view('pages.office.profile.overview.overview');
    }
    public function index_setting(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.setting.main');
        }
        return view('pages.office.theme');
    }
    public function setting()
    {
        $province = Province::get();
        return view('pages.office.profile.setting.setting', compact('province'));
    }
    public function index_security(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.security.main');
        }
        return view('pages.office.theme');
    }
    public function security()
    {
        return view('pages.office.profile.security.security');
    }
    public function index_billing(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.billing.main');
        }
        return view('pages.office.theme');
    }
    public function billing()
    {
        return view('pages.office.profile.billing.billing');
    }
    public function index_statement(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.statement.main');
        }
        return view('pages.office.theme');
    }
    public function statement()
    {
        return view('pages.office.profile.statement.statement');
    }
    public function index_referral(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.referral.main');
        }
        return view('pages.office.theme');
    }
    public function referral()
    {
        return view('pages.office.profile.referral.referral');
    }
    public function index_log(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.log.main');
        }
        return view('pages.office.theme');
    }
    public function log()
    {
        return view('pages.office.profile.log.log');
    }
    public function index_project(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.project.main');
        }
        return view('pages.office.theme');
    }
    public function project()
    {
        return view('pages.office.profile.project.project');
    }
    public function index_campaign(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.campaign.main');
        }
        return view('pages.office.theme');
    }
    public function campaign()
    {
        return view('pages.office.profile.campaign.campaign');
    }
    public function index_follower(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.follower.main');
        }
        return view('pages.office.theme');
    }
    public function follower()
    {
        return view('pages.office.profile.follower.follower');
    }
    public function index_activity(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.profile.activity.main');
        }
        return view('pages.office.theme');
    }
    public function activity()
    {
        return view('pages.office.profile.activity.activity');
    }
    public function change_avatar(Request $request)
    {
        $user = Auth::guard('employees')->user();
        $user = Employee::where('id',$user->id)->first();
        if(Auth::guard('employees')->user()->avatar){
            Storage::delete(Auth::guard('employees')->user()->avatar);
        }
        $avatar = request()->file('avatar')->store('avatar');
        $user->avatar = $avatar;
        $user->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Avatar Uploaded !',
        ]);
    }
    public function remove_avatar(Request $request)
    {
        $user = Auth::guard('employees')->user();
        $user = Employee::where('id',$user->id)->first();
        if(Auth::guard('employees')->user()->avatar){
            Storage::delete(Auth::guard('employees')->user()->avatar);
        }
        $avatar = null;
        $user->avatar = $avatar;
        $user->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Avatar Removed !',
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|max:13',
            'birth_date' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $user = Auth::guard('employees')->user();
        $user = Employee::where('id',$user->id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->date_birth = $request->birth_date;
        $user->bio = $request->bio;
        $user->impression = $request->impression;
        $user->address = $request->address;
        $user->province_id = $request->province;
        $user->regency_id = $request->regency;
        $user->district_id = $request->district;
        $user->village_id = $request->village;
        $user->postcode = $request->postcode;
        $user->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Profile Updated!',
        ]);
    }
    public function get_cv(Request $request)
    {
        $user = Auth::guard('employees')->user();
        $user = Employee::where('id',$user->id)->first();
        $obj['name'] = $user->cv;
        $file_path = storage_path('app/public/'.$user->cv);
        $obj['size'] = filesize($file_path);
        $obj['path'] = asset('storage/'.$user->cv);
        $data[] = $obj;
        return response()->json($data);
    }
    public function upload_cv(Request $request)
    {
        $user = Auth::guard('employees')->user();
        $user = Employee::where('id',$user->id)->first();
        if(Auth::guard('employees')->user()->cv){
            Storage::delete(Auth::guard('employees')->user()->cv);
        }
        $cv = request()->file('file')->store('cv');
        $user->cv = $cv;
        $user->update();
        return response()->json([$user->cv]);
    }
    public function remove_cv(Request $request)
    {
        $user = Auth::guard('employees')->user();
        $user = Employee::where('id',$user->id)->first();
        if(Auth::guard('employees')->user()->cv){
            Storage::delete(Auth::guard('employees')->user()->cv);
        }
        $cv = null;
        $user->cv = $cv;
        $user->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'CV Removed !',
        ]);
    }
    public function update_sosmed(Request $request)
    {
        $user = Auth::guard('employees')->user();
        $user = Employee::where('id',$user->id)->first();
        $user->instagram_url = $request->instagram;
        $user->linkedin_url = $request->linkedin;
        $user->facebook_url = $request->facebook;
        $user->twitter_url = $request->twitter;
        $user->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Profile Updated!',
        ]);
    }
}

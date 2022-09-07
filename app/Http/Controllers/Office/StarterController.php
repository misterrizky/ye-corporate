<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;

class StarterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('starter.1');
        }
        return view('starter.theme');
    }
    public function do_start(Request $request)
    {
        return response()->json([
            'alert' => 'success',
            'message' => 'Lets Start',
            'callback' => 'check',
            'route' => route('install.index_app_requirements'),
        ]);
    }
    public function index_app_requirements(Request $request)
    {
        if($request->ajax())
        {
            $permission['curl_enabled']           = function_exists('curl_version');
            $permission['env_write_perm']     = is_writable(base_path('.env'));
            $permission['routes_file_write_perm'] = is_writable(base_path('app/Providers/RouteServiceProvider.php'));
            return view('starter.2',compact('permission'));
        }
        return view('starter.theme');
    }
    public function check_requirements()
    {
        $phpVersion = number_format((float)phpversion(), 0, '.', '');
        $permission['curl_enabled']           = function_exists('curl_version');
        $permission['env_write_perm']     = is_writable(base_path('.env'));
        $permission['routes_file_write_perm'] = is_writable(base_path('app/Providers/RouteServiceProvider.php'));
        if($phpVersion >= 8 && $permission['curl_enabled'] && $permission['env_write_perm'] && $permission['routes_file_write_perm'])
        {
            return response()->json([
                'alert' => 'success',
                'message' => 'Checking App Requirement Complete',
                'callback' => 'check',
                'route' => route('install.index_slogan'),
            ]);
        }else{
            return response()->json([
                'alert' => 'success',
                'message' => 'Check your configuration',
                'callback' => 'check',
                'route' => route('install.index_app_requirements'),
            ]);
        }
    }
    public function index_slogan(Request $request)
    {
        if($request->ajax())
        {
            return view('starter.3');
        }
        return view('starter.theme');
    }
    public function check_slogan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slogan' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('slogan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('slogan'),
                ]);
            }
        }
        if($request->slogan == "Simplify Your Future")
        {
            return response()->json([
                'alert' => 'success',
                'message' => 'Verified Completed',
                'callback' => 'check',
                'route' => route('install.index_env'),
            ]);
        }else{
            return response()->json([
                'alert' => 'success',
                'message' => 'Yada Ekidanta Slogan Not Matched',
            ]);
        }
    }
    public function index_env(Request $request)
    {
        if($request->ajax())
        {
            return view('starter.4');
        }
        return view('starter.theme');
    }
    public function check_connection(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'DB_HOST' => 'required',
            'DB_DATABASE' => 'required',
            'DB_USERNAME' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('DB_HOST')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('DB_HOST'),
                ]);
            }
            elseif ($errors->has('DB_DATABASE')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('DB_DATABASE'),
                ]);
            }
            elseif ($errors->has('DB_USERNAME')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('DB_USERNAME'),
                ]);
            }
        }
        if(self::check_credential($request->DB_HOST, $request->DB_DATABASE, $request->DB_USERNAME,$request->DB_PASSWORD)){
            return response()->json([
                'alert' => 'success',
                'message' => 'App Connected',
                'callback' => 'check',
                'route' => route('install.index_migrate'),
            ]);
        }else{
            return response()->json([
                'alert' => 'success',
                'message' => 'Invalid Database Credentials!! Please check your database credentials carefully',
            ]);
        }
    }
    public function check_credential($db_host = "", $db_name = "", $db_user = "", $db_pass = "")
    {
        if(@mysqli_connect($db_host, $db_user, $db_pass, $db_name)) {
            return true;
        }else {
            return false;
        }
    }
    public function index_migrate(Request $request)
    {
        if($request->ajax())
        {
            return view('starter.5');
        }
        return view('starter.theme');
    }
    public function start_migrate()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        return response()->json([
            'alert' => 'success',
            'message' => 'App Connected',
            'callback' => 'check',
            'route' => route('install.index_setting'),
        ]);
    }
}

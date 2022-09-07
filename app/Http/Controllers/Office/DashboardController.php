<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:dashboard-default', ['only' => ['index']]);
        // $this->middleware('permission:dashboard-ecommerce', ['only' => ['ecommerce']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            if(Auth::guard('employees')->user()->department_id != 0 && Auth::guard('employees')->user()->position_id != 0){
                return view('pages.office.dashboard.main');
            }else{
                return view('pages.office.dashboard.welcome');
            }
        }
        return view('pages.office.theme');
    }
    public function ecommerce(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.dashboard.ecommerce');
        }
        return view('pages.office.theme');
    }
    public function project(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.dashboard.project');
        }
        return view('pages.office.theme');
    }
    public function marketing(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.dashboard.marketing');
        }
        return view('pages.office.theme');
    }
    public function analytic(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.dashboard.analytic');
        }
        return view('pages.office.theme');
    }
    public function finance(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.dashboard.finance');
        }
        return view('pages.office.theme');
    }
}

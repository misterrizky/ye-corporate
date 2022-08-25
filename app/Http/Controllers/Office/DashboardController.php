<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.dashboard.main');
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

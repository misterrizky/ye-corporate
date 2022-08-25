<?php

namespace App\Http\Controllers\Office\Communication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HRM\EmployeeAttendance;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employees');
    }
    public function index()
    {
        Auth::guard('employees')->user()->unreadNotifications->markAsRead();
        return view('notification.list');
    }
    public function counter()
    {
        return response()->json([
            'total_notif' => Auth::guard('employees')->user()->unreadNotifications->count() ? Auth::guard('employees')->user()->unreadNotifications->count() : 0,
        ]);
    }
    public function log()
    {
        $attendance = EmployeeAttendance::where('employee_id',Auth::guard('employees')->user()->id)->latest('id')->get();
        return view('notification.log',compact('attendance'));
    }
}

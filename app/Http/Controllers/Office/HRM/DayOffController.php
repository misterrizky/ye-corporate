<?php

namespace App\Http\Controllers\Office\HRM;

use App\Models\HRM\DayOff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DayOffController extends Controller
{
    public function __construct()
    {
        // 
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            return view('pages.office.hrm.day-off.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.hrm.day-off.input',['data' => new DayOff]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'amount' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $day = new DayOff;
        $day->employee_id = Auth::guard('employees')->user()->id;
        $day->date = $request->date;
        $day->amount = $request->amount;
        $day->st = 'Pending';
        $day->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Day Off Created',
        ]);
    }
    public function show(DayOff $dayOff)
    {
        //
    }
    public function edit(DayOff $dayOff)
    {
        // return view('pages.office.hrm.day-off.input',['data' => $dayOff]);
    }
    public function update(Request $request, DayOff $dayOff)
    {
        //
    }
    public function destroy(DayOff $dayOff)
    {
        //
    }
    public function list(Request $request)
    {
        $collection = DayOff::where('date', 'like', '%'.$request->keyword.'%')->where('employee_id',Auth::guard('employees')->user()->id)->paginate(10);
        return view('pages.office.hrm.day-off.list', ['collection' => $collection]);
    }
}

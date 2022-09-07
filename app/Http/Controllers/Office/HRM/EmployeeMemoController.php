<?php

namespace App\Http\Controllers\Office\HRM;

use Illuminate\Http\Request;
use App\Models\HRM\EmployeeMemo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeMemoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $collection = EmployeeMemo::where('employee_id',Auth::guard('employees')->user()->id)->latest()->get();
        return view('pages.office.memo.list',compact('collection'));
    }
    public function create()
    {
        return view('pages.office.memo.input', ['data'=> new EmployeeMemo]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_memo' => 'required',
            'body_memo' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $employeeMemo = new EmployeeMemo;
        $employeeMemo->employee_id = Auth::guard('employees')->user()->id;
        $employeeMemo->title = $request->title_memo;
        $employeeMemo->body = $request->body_memo;
        $employeeMemo->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Memo Created',
            'redirect' => 'memo',
        ]);
    }
    public function show(EmployeeMemo $employeeMemo)
    {
        //
    }
    public function edit(EmployeeMemo $employeeMemo)
    {
        return view('pages.office.memo.input', ['data'=> $employeeMemo]);
    }
    public function update(Request $request, EmployeeMemo $employeeMemo)
    {
        $validator = Validator::make($request->all(), [
            'title_memo' => 'required',
            'body_memo' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $employeeMemo->title = $request->title_memo;
        $employeeMemo->body = $request->body_memo;
        $employeeMemo->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Memo Updated',
            'redirect' => 'memo',
        ]);
    }
    public function destroy(EmployeeMemo $employeeMemo)
    {
        $employeeMemo->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Memo Deleted',
            'redirect' => 'memo',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Office\HRM;

use App\Models\HRM\Position;
use Illuminate\Http\Request;
use App\Models\HRM\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:department-create', ['only' => ['create','store']]);
        // $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.hrm.department.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.hrm.department.input', ['data' => new Department]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name',
            'desc' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $department = new Department;
        $department->name = $request->name;
        $department->desc = $request->desc;
        $department->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Department Created',
        ]);
    }
    public function show(Request $request, Department $department)
    {
        if($request->ajax())
        {
            return view('pages.office.hrm.department.show', ['data' => $department]);
        }
        return view('pages.office.theme');
    }
    public function edit(Department $department)
    {
        return view('pages.office.hrm.department.input', ['data' => $department]);
    }
    public function update(Request $request, Department $department)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name,'.$department->id,
            'desc' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $department->name = $request->name;
        $department->desc = $request->desc;
        $department->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Department Updated',
        ]);
    }
    public function destroy(Department $department)
    {
        Position::where('department_id',$department->id)->update(['department_id' => 0]);
        $department->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Department Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Department::get();
        return view('pages.office.hrm.department.list', compact('collection'));
    }
    public function show_list(Request $request, Department $department)
    {
        $collection = $department->position;
        return view('pages.office.hrm.department.show_list', compact('collection'));
    }
    public function show_create(Department $department)
    {
        return view('pages.office.hrm.department.show_input', ['data' => new Position, 'department' => $department]);
    }
    public function show_edit(Department $department, Position $position)
    {
        return view('pages.office.hrm.department.show_input', ['data' => $position, 'department' => $department]);
    }
    public function get_list(Request $request)
    {
        $collection = Position::where('department_id',$request->department)->get();
        $list = "<option value=''>Choose Position</option>";
        foreach($collection as $row){
            $list .= "<option value='$row->id'>$row->name</option>";
        }
        return $list;
    }
}
<?php

namespace App\Http\Controllers\Office\HRM;

use App\Models\HRM\Employee;
use Illuminate\Http\Request;
use App\Models\HRM\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.hrm.employee.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        $department = Department::get();
        return view('pages.office.hrm.employee.input' , ['data' => new Employee, 'department' => $department]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|min:9|max:20|unique:employees,nip',
            'name' => 'required',
            'email' => 'required|unique:employees,email',
            'phone' => 'required|min:9|max:13|unique:employees,phone',
            'department' => 'required',
            'position' => 'required',
            'job_desc' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nip')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nip'),
                ]);
            }elseif ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }elseif ($errors->has('department')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('department'),
                ]);
            }elseif ($errors->has('position')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('position'),
                ]);
            }elseif ($errors->has('job_desc')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('job_desc'),
                ]);
            }
        }
        $employee = new Employee;
        $employee->nip = $request->nip;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->department_id = $request->department;
        $employee->position_id = $request->position;
        $employee->jobdesc = $request->job_desc;
        $employee->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Employee Created',
        ]);
    }
    public function show(Request $request, Employee $employee)
    {
        if($request->ajax())
        {
            return view('pages.office.hrm.employee.show',compact('employee'));
        }
        return view('pages.office.theme');
    }
    public function edit(Employee $employee)
    {
        $department = Department::get();
        return view('pages.office.hrm.employee.input' , ['data' => $employee, 'department' => $department]);
    }
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:employees,nip,'.$employee->id,
            'name' => 'required',
            'email' => 'required|unique:employees,email,'.$employee->id,
            'phone' => 'required|min:9|max:13|unique:employees,phone,'.$employee->id,
            'department' => 'required',
            'position' => 'required',
            'job_desc' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nip')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nip'),
                ]);
            }elseif ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }elseif ($errors->has('department')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('department'),
                ]);
            }elseif ($errors->has('position')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('position'),
                ]);
            }elseif ($errors->has('job_desc')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('job_desc'),
                ]);
            }
        }
        $employee->nip = $request->nip;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->department_id = $request->department;
        $employee->position_id = $request->position;
        $employee->jobdesc = $request->job_desc;
        $employee->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Employee Updated',
        ]);
    }
    public function destroy(Employee $employee)
    {
        return response()->json([
            'alert' => 'success',
            'message' => 'Employee Can`t be deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Employee::where('nip','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->where('department_id','!=',0)->where('position_id','!=',0)->paginate(5);
        return view('pages.office.hrm.employee.list',compact('collection'));
    }
}

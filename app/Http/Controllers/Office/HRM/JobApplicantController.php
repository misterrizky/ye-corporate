<?php

namespace App\Http\Controllers\Office\HRM;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HRM\JobApplicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobApplicantController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'expected_salary' => 'required',
            'messages' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $cek = JobApplicant::where('vacancy_id',$request->vacancy)->where('employee_id',Auth::guard('employees')->user()->id)->get()->count();
        if($cek > 0){
            return response()->json([
                'alert' => 'success',
                'message' => 'You have already applied for this position',
            ]);
        }
        $jobApplicant = new JobApplicant;
        $jobApplicant->vacancy_id = $request->vacancy;
        $jobApplicant->employee_id = Auth::guard('employees')->user()->id;
        $jobApplicant->expected_salary = Str::remove(",",$request->expected_salary);
        $jobApplicant->messages = $request->messages;
        $jobApplicant->st = 'p';
        $jobApplicant->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Application Sent',
        ]);
    }
    public function show(JobApplicant $jobApplicant)
    {
        //
    }
    public function edit(JobApplicant $jobApplicant)
    {
        //
    }
    public function update(Request $request, JobApplicant $jobApplicant)
    {
        //
    }
    public function destroy(JobApplicant $jobApplicant)
    {
        //
    }
    public function accept(JobApplicant $applicant)
    {
        $applicant->st = 'a';
        $applicant->update();
        $employee = $applicant->employee;
        $employee->department_id = $applicant->vacancy->department_id;
        $employee->position_id = $applicant->vacancy->position_id;
        $employee->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Applicant Accepted',
        ]);
    }
    public function reject(JobApplicant $applicant)
    {
        $applicant->st = 'r';
        $applicant->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Applicant Rejected',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Office\HRM;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HRM\Department;
use App\Models\HRM\VacancyJob;
use App\Models\HRM\JobApplicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VacancyJobController extends Controller
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
            return view('pages.office.hrm.vacancy.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        $department = Department::get();
        return view('pages.office.hrm.vacancy.input', ['data' => new VacancyJob, 'department' => $department]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'position' => 'required',
            'title' => 'required',
            'description' => 'required',
            'requirement' => 'required',
            'facilities' => 'required',
            'rates' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $vacancyJob = new VacancyJob;
        $vacancyJob->department_id = $request->department;
        $vacancyJob->position_id = $request->position;
        $vacancyJob->title = $request->title;
        $vacancyJob->slug = Str::slug($request->title);
        $vacancyJob->description = $request->description;
        $vacancyJob->requirement = $request->requirement;
        $vacancyJob->facilities = $request->facilities;
        $vacancyJob->rates = Str::remove(',',$request->rates);
        $vacancyJob->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Vacancy Job Created',
        ]);
    }
    public function show(Request $request, VacancyJob $vacancy)
    {
        if($request->ajax())
        {
            return view('pages.office.hrm.vacancy.show', ['data' => $vacancy]);
        }
        return view('pages.office.theme');
    }
    public function edit(VacancyJob $vacancy)
    {
        $department = Department::get();
        return view('pages.office.hrm.vacancy.input', ['data' => $vacancy, 'department' => $department]);
    }
    public function update(Request $request, VacancyJob $vacancy)
    {
        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'position' => 'required',
            'title' => 'required',
            'description' => 'required',
            'requirement' => 'required',
            'facilities' => 'required',
            'rates' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $vacancy->department_id = $request->department;
        $vacancy->position_id = $request->position;
        $vacancy->title = $request->title;
        $vacancy->slug = Str::slug($request->title);
        $vacancy->description = $request->description;
        $vacancy->requirement = $request->requirement;
        $vacancy->facilities = $request->facilities;
        $vacancy->rates = $request->rates;
        $vacancy->st = $request->st;
        $vacancy->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Vacancy Job Updated',
        ]);
    }
    public function destroy(VacancyJob $vacancy)
    {
        $vacancy->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Vacancy Job Deleted',
        ]);
    }
    public function list(Request $request)
    {
        if(Auth::guard('employees')->user()->department_id != 0 && Auth::guard('employees')->user()->position_id != 0){
            $collection = VacancyJob::where('title','LIKE','%'.$request->keyword.'%')->paginate(5);
        }else{
            $collection = VacancyJob::where('title','LIKE','%'.$request->keyword.'%')->where('st','Open')->paginate(5);
        }
        return view('pages.office.hrm.vacancy.list',compact('collection'));
    }
    public function show_list(Request $request, VacancyJob $vacancy)
    {
        $collection = JobApplicant::where('vacancy_id',$vacancy->id)->paginate(5);
        return view('pages.office.hrm.vacancy.show_list',compact('collection'));
    }
    public function show_create(Request $request, VacancyJob $vacancy)
    {
        return view('pages.office.hrm.vacancy.show_list',compact('vacancy'));
    }
    public function open(VacancyJob $vacancy)
    {
        $vacancy->st = 'Open';
        $vacancy->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Vacancy Job Open',
        ]);
    }
    public function close(VacancyJob $vacancy)
    {
        $vacancy->st = 'Closed';
        $vacancy->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Vacancy Job Closed',
        ]);
    }
}

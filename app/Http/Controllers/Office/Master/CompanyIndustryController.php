<?php

namespace App\Http\Controllers\Office\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\CompanyIndustry;
use Illuminate\Support\Facades\Validator;

class CompanyIndustryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:industry-list|industry-create|industry-edit|industry-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:industry-create', ['only' => ['create','store']]);
        // $this->middleware('permission:industry-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:industry-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.master.industry.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.master.industry.input',['data' => new CompanyIndustry]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|max:100',
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $companyIndustry = new CompanyIndustry;
        $companyIndustry->name = $request->name;
        $companyIndustry->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Company Industry Saved',
        ]);
    }
    public function show(CompanyIndustry $companyIndustry)
    {
        //
    }
    public function edit(CompanyIndustry $companyIndustry)
    {
        return view('pages.office.master.industry.input',['data' => $companyIndustry]);
    }
    public function update(Request $request, CompanyIndustry $companyIndustry)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $companyIndustry->name = $request->name;
        $companyIndustry->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Company Industry Updated',
        ]);
    }
    public function destroy(CompanyIndustry $companyIndustry)
    {
        $companyIndustry->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Company Industry Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = CompanyIndustry::where('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.master.industry.list',compact('collection'));
    }
}

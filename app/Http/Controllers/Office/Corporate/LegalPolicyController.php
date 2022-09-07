<?php

namespace App\Http\Controllers\Office\Corporate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Corporate\LegalPolicy;
use Illuminate\Support\Facades\Validator;

class LegalPolicyController extends Controller
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
            return view('pages.office.corporate.policy.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.corporate.policy.input', ['data' => new LegalPolicy]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:legal_policies,title',
            'body' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $legalPolicy = new LegalPolicy;
        $legalPolicy->title = $request->title;
        $legalPolicy->body = $request->body;
        $legalPolicy->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Legal Policy Created',
        ]);
    }
    public function show(LegalPolicy $legalPolicy)
    {
        //
    }
    public function edit(LegalPolicy $legalPolicy)
    {
        return view('pages.office.corporate.policy.input', ['data' => $legalPolicy]);
    }
    public function update(Request $request, LegalPolicy $legalPolicy)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:legal_policies,title,'.$legalPolicy->id,
            'body' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $legalPolicy->title = $request->title;
        $legalPolicy->body = $request->body;
        $legalPolicy->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Legal Policy Updated',
        ]);
    }
    public function destroy(LegalPolicy $legalPolicy)
    {
        $legalPolicy->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Legal Policy Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = LegalPolicy::get();
        return view('pages.office.corporate.policy.list', compact('collection'));
    }
}

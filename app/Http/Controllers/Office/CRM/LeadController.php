<?php

namespace App\Http\Controllers\Office\CRM;

use App\Models\CRM\Lead;
use Illuminate\Http\Request;
use App\Models\CRM\ContactGroup;
use App\Models\CRM\LeadActivity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\CompanyIndustry;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:leads-list|leads-create|leads-edit|leads-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:leads-create', ['only' => ['create','store']]);
        // $this->middleware('permission:leads-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:leads-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.crm.lead.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        $collection = Lead::get();
        $industry = CompanyIndustry::get();
        $group = ContactGroup::get();
        return view('pages.office.crm.lead.input', ['data' => new Lead, 'collection' => $collection, 'group' => $group, 'industry' => $industry]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'group' => 'required',
            'industry' => 'required',
            'name' => 'required',
            'phone' => 'required|unique:leads,phone',
            'email' => 'required|unique:leads,email',
            'notes' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $lead = new Lead;
        $lead->employee_id = Auth::guard('employees')->user()->id;
        $lead->contact_group_id = $request->group;
        $lead->company_industry_id = $request->industry;
        $lead->company_name = $request->company_name;
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->address = $request->address;
        $lead->notes = $request->notes;
        $lead->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Lead Created',
        ]);
    }
    public function show(Request $request,Lead $lead)
    {
        if($request->ajax())
        {
            $follow = LeadActivity::where('lead_id', $lead->id)->where('type','Follow Up')->get();
            $date = LeadActivity::select('date')->where('lead_id', $lead->id)->where('type','Meeting')->groupBy('date')->get();
            $collection = Lead::get();
            return view('pages.office.crm.lead.show', ['data' => $lead, 'collection' => $collection, 'follow' => $follow, 'date' => $date]);
        }
        return view('pages.office.theme');
    }
    public function edit(Lead $lead)
    {
        $collection = Lead::get();
        $industry = CompanyIndustry::get();
        $group = ContactGroup::get();
        return view('pages.office.crm.lead.input', ['data' => $lead, 'collection' => $collection, 'group' => $group, 'industry' => $industry]);
    }
    public function update(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'group' => 'required',
            'industry' => 'required',
            'name' => 'required',
            'phone' => 'required|unique:leads,phone,'.$lead->id,
            'email' => 'required|unique:leads,email,'.$lead->id,
            'notes' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $lead->contact_group_id = $request->group;
        $lead->company_name = $request->company_name;
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->address = $request->address;
        $lead->notes = $request->notes;
        $lead->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Department Updated',
        ]);
    }
    public function destroy(Lead $lead)
    {
        $lead->activities->count() > 0 ? $lead->activities->delete() : '';
        $lead->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Lead Deleted',
            'redirect' => 'main',
            'route' => route('office.crm.lead.index'),
        ]);
    }
    public function list(Request $request)
    {
        $collection = Lead::paginate(10);
        return view('pages.office.crm.lead.list', compact('collection'));
    }
    public function show_list(Request $request, Lead $lead)
    {
        $collection = LeadActivity::where('id',$request->keyword)->orWhere('name','LIKE','%'.$request->keyword.'%')->where('lead_id',$lead->id)->paginate(10);
        return view('pages.office.crm.lead.show_list',compact('collection'));
    }
    public function show_create(Lead $lead)
    {
        return view('pages.office.crm.lead.show_input', ['data' => new LeadActivity, 'lead' => $lead]);
    }
    public function show_edit(Lead $lead, LeadActivity $leadActivity)
    {
        return view('pages.office.crm.lead.show_input', ['data' => $leadActivity, 'lead' => $lead]);
    }
}

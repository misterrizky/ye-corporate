<?php

namespace App\Http\Controllers\Office\CRM;

use App\Models\CRM\Lead;
use App\Models\CRM\Client;
use Illuminate\Http\Request;
use App\Models\CRM\ContactGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:contactGroup-list|contactGroup-create|contactGroup-edit|contactGroup-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:contactGroup-create', ['only' => ['create','store']]);
        // $this->middleware('permission:contactGroup-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:contactGroup-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $lead = Lead::get();
        $collection = ContactGroup::get();
        return view('pages.office.crm.group.list',compact('collection','lead'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:contact_groups,name',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $group = new ContactGroup;
        $group->name = $request->name;
        $group->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Group Created',
        ]);
    }
    public function show(ContactGroup $contactGroup)
    {
        //
    }
    public function edit(ContactGroup $contactGroup)
    {
        //
    }
    public function update(Request $request, ContactGroup $contactGroup)
    {
        //
    }
    public function destroy(ContactGroup $contactGroup)
    {
        Lead::where('contact_group_id',$contactGroup->id)->update(['contact_group_id' => 0]);
        Client::where('contact_group_id',$contactGroup->id)->update(['contact_group_id' => 0]);
        $contactGroup->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Group Deleted',
        ]);
    }
}

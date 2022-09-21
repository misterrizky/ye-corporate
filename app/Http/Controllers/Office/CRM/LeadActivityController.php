<?php

namespace App\Http\Controllers\Office\CRM;

use Illuminate\Http\Request;
use App\Models\CRM\LeadActivity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeadActivityController extends Controller
{
    public function __construct()
    {
        // 
    }
    public function index(Request $request)
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
            'date' => 'required',
            'type' => 'required',
            'notes' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $lead = new LeadActivity;
        $lead->employee_id = Auth::guard('employees')->user()->id;
        $lead->lead_id = $request->lead;
        $lead->date = $request->date;
        $lead->type = $request->type;
        $lead->notes = $request->notes;
        $lead->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Activity Created',
        ]);
    }
    public function show(LeadActivity $leadActivity)
    {
        //
    }
    public function edit(LeadActivity $leadActivity)
    {
        //
    }
    public function update(Request $request, LeadActivity $leadActivity)
    {
        //
    }
    public function destroy(LeadActivity $leadActivity)
    {
        //
    }
    public function complete(LeadActivity $leadActivity)
    {
        $leadActivity->completed_at = now();
        $leadActivity->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Activity Completed',
        ]);
    }
    public function uncomplete(LeadActivity $leadActivity)
    {
        $leadActivity->completed_at = null;
        $leadActivity->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Activity On Progress',
        ]);
    }
}

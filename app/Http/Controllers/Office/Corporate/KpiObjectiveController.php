<?php

namespace App\Http\Controllers\Office\Corporate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Corporate\KpiObjective;
use Illuminate\Support\Facades\Validator;

class KpiObjectiveController extends Controller
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
            'objective' => 'required',
            'department' => 'required',
            'position' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $objective = new KpiObjective;
        $objective->kpi_id = $request->kpi;
        $objective->objective = $request->objective;
        $objective->department_id = $request->department;
        $objective->position_id = $request->position;
        $objective->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Objective Created',
        ]);
    }
    public function show(KpiObjective $kpiObjective)
    {
        //
    }
    public function edit(KpiObjective $kpiObjective)
    {
        //
    }
    public function update(Request $request, KpiObjective $kpiObjective)
    {
        //
    }
    public function destroy(KpiObjective $kpiObjective)
    {
        //
    }
}

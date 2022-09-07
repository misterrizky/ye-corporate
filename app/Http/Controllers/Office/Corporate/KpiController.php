<?php

namespace App\Http\Controllers\Office\Corporate;

use Illuminate\Http\Request;
use App\Models\Corporate\Kpi;
use App\Models\HRM\Department;
use App\Http\Controllers\Controller;
use App\Models\Corporate\KpiObjective;
use Illuminate\Support\Facades\Validator;

class KpiController extends Controller
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
            return view('pages.office.corporate.kpi.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.corporate.kpi.input', ['data' => new Kpi]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'function' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $kpi = new Kpi;
        $kpi->function = $request->function;
        $kpi->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'KPI Created',
        ]);
    }
    public function show(Request $request, Kpi $kpi)
    {
        if($request->ajax())
        {
            return view('pages.office.corporate.kpi.show',['data' => $kpi]);
        }
        return view('pages.office.theme');
    }
    public function edit(Kpi $kpi)
    {
        return view('pages.office.corporate.kpi.input', ['data' => $kpi]);
    }
    public function update(Request $request, Kpi $kpi)
    {
        $validator = Validator::make($request->all(), [
            'function' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $kpi->function = $request->function;
        $kpi->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'KPI Updated',
        ]);
    }
    public function destroy(Kpi $kpi)
    {
        $kpi->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'KPI Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Kpi::paginate(10);
        return view('pages.office.corporate.kpi.list', compact('collection'));
    }
    public function show_list(Request $request, Kpi $kpi)
    {
        $collection = KpiObjective::where('kpi_id',$kpi->id)->paginate(10);
        return view('pages.office.corporate.kpi.show_list', compact('collection'));
    }
    public function show_create(Kpi $kpi)
    {
        $department = Department::get();
        return view('pages.office.corporate.kpi.show_input', ['data' => new KpiObjective, 'kpi' => $kpi, 'department' => $department]);
    }
}

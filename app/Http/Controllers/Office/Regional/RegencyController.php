<?php

namespace App\Http\Controllers\Office\Regional;

use Illuminate\Http\Request;
use App\Models\Regional\Regency;
use App\Models\Regional\District;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:regency-list|regency-create|regency-edit|regency-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:regency-create', ['only' => ['create','store']]);
        // $this->middleware('permission:regency-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:regency-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.regency.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.regional.regency.input', ['data' => new Regency]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:regencies,id',
            'name' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $regency = new Regency;
        $regency->province_id = $request->province_id;
        $regency->id = $request->code;
        $regency->name = $request->name;
        $regency->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Regency Saved',
        ]);
    }
    public function show(Request $request, Regency $regency)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.regency.show',compact('regency'));
        }
        return view('pages.office.theme');
    }
    public function edit(Regency $regency)
    {
        return view('pages.office.regional.regency.input', ['data' => $regency]);
    }
    public function update(Request $request, Regency $regency)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:regencies,id,'.$regency->id,
            'name' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $regency->province_id = $request->province_id;
        $regency->id = $request->code;
        $regency->name = $request->name;
        $regency->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Regency Updated',
        ]);
    }
    public function destroy(Regency $regency)
    {
        $regency->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Regency Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Regency::where('id','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.regional.regency.list',compact('collection'));
    }
    public function show_list(Request $request, Regency $regency)
    {
        $collection = District::where('regency_id',$regency->id)->where('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.regional.regency.show_list',compact('collection'));
    }
    public function show_create(Regency $regency)
    {
        return view('pages.office.regional.regency.show_input', ['data' => new District, 'regency' => $regency]);
    }
    public function show_edit(Regency $regency, District $district)
    {
        return view('pages.office.regional.regency.show_input', ['data' => $district, 'regency' => $regency]);
    }
    public function get_list(Request $request)
    {
        $collection = District::where('regency_id',$request->regency)->get();
        $list = "<option value=''>Choose District</option>";
        foreach($collection as $row){
            $list .= "<option value='$row->id'>$row->name</option>";
        }
        return $list;
    }
}

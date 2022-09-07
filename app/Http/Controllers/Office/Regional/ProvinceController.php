<?php

namespace App\Http\Controllers\Office\Regional;

use Illuminate\Http\Request;
use App\Models\Regional\Country;
use App\Models\Regional\Regency;
use App\Models\Regional\Province;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:province-list|province-create|province-edit|province-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:province-create', ['only' => ['create','store']]);
        // $this->middleware('permission:province-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:province-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.province.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        $country = Country::get();
        return view('pages.office.regional.province.input', ['data' => new Province, 'country' => $country]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:provinces,id',
            'name' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $province = new Province;
        $province->country_id = $request->country_id;
        $province->id = $request->code;
        $province->name = $request->name;
        $province->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Province Saved',
        ]);
    }
    public function show(Request $request, Province $province)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.province.show',compact('province'));
        }
        return view('pages.office.theme');
    }
    public function edit(Province $province)
    {
        $country = Country::get();
        return view('pages.office.regional.province.input', ['data' => $province, 'country' => $country]);
    }
    public function update(Request $request, Province $province)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:provinces,id,'.$province->id,
            'name' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $province->country_id = $request->country_id;
        $province->id = $request->code;
        $province->name = $request->name;
        $province->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Province Updated',
        ]);
    }
    public function destroy(Province $province)
    {
        $province->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Province Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Province::where('id','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.regional.province.list',compact('collection'));
    }
    public function show_list(Request $request, Province $province)
    {
        $collection = Regency::where('province_id',$province->id)->where('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.regional.province.show_list',compact('collection'));
    }
    public function show_create(Province $province)
    {
        return view('pages.office.regional.province.show_input', ['data' => new Regency, 'province' => $province]);
    }
    public function show_edit(Province $province, Regency $regency)
    {
        return view('pages.office.regional.province.show_input', ['data' => $regency, 'province' => $province]);
    }
    public function get_list(Request $request)
    {
        $collection = Regency::where('province_id',$request->province)->get();
        $list = "<option value=''>Choose Regency</option>";
        foreach($collection as $row){
            $list .= "<option value='$row->id'>$row->name</option>";
        }
        return $list;
    }
}

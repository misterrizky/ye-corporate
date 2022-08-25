<?php

namespace App\Http\Controllers\Office\Regional;

use Illuminate\Http\Request;
use App\Models\Regional\Village;
use App\Models\Regional\District;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.district.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.regional.district.input', ['data' => new District]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:districts,id',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('code')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('code'),
                ]);
            }else if($errors->has('name')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
        }
        $district = new District;
        $district->regency_id = $request->regency_id;
        $district->id = $request->code;
        $district->name = $request->name;
        $district->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'District Saved',
        ]);
    }
    public function show(Request $request, District $district)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.district.show',compact('district'));
        }
        return view('pages.office.theme');
    }
    public function edit(District $district)
    {
        return view('pages.office.regional.district.input', ['data' => $district]);
    }
    public function update(Request $request, District $district)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:districts,id,'.$district->id,
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('code')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('code'),
                ]);
            }else if($errors->has('name')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
        }
        $district->regency_id = $request->regency_id;
        $district->id = $request->code;
        $district->name = $request->name;
        $district->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'District Updated',
        ]);
    }
    public function destroy(District $district)
    {
        $district->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'District Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = District::where('id','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.regional.district.list',compact('collection'));
    }
    public function show_list(Request $request, District $district)
    {
        $collection = Village::where('district_id',$district->id)->where('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.regional.district.show_list',compact('collection'));
    }
    public function show_create(District $district)
    {
        return view('pages.office.regional.district.show_input', ['data' => new Village, 'district' => $district]);
    }
    public function show_edit(District $district, Village $village)
    {
        return view('pages.office.regional.district.show_input', ['data' => $village, 'district' => $district]);
    }
}

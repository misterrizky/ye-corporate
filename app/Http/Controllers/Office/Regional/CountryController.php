<?php

namespace App\Http\Controllers\Office\Regional;

use Illuminate\Http\Request;
use App\Models\Regional\Country;
use App\Models\Regional\Province;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.country.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.regional.country.input', ['data' => new Country]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:countries',
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
        $country = new Country;
        $country->code = $request->code;
        $country->name = $request->name;
        $country->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Country Saved',
        ]);
    }
    public function show(Request $request, Country $country)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.country.show',compact('country'));
        }
        return view('pages.office.theme');
    }
    public function edit(Country $country)
    {
        return view('pages.office.regional.country.input', ['data' => $country]);
    }
    public function update(Request $request, Country $country)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:countries,code,'.$country->id,
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
        $country->code = $request->code;
        $country->name = $request->name;
        $country->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Country Updated',
        ]);
    }
    public function destroy(Country $country)
    {
        $country->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Country Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Country::where('code','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.regional.country.list',compact('collection'));
    }
    public function show_list(Request $request, Country $country)
    {
        $collection = Province::where('id',$request->keyword)->orWhere('name','LIKE','%'.$request->keyword.'%')->where('country_id',$country->id)->paginate(10);
        return view('pages.office.regional.country.show_list',compact('collection'));
    }
    public function show_create(Country $country)
    {
        return view('pages.office.regional.country.show_input', ['data' => new Province, 'country' => $country]);
    }
    public function show_edit(Country $country, Province $province)
    {
        return view('pages.office.regional.country.show_input', ['data' => $province, 'country' => $country]);
    }
}

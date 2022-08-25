<?php

namespace App\Http\Controllers\Office\Regional;

use Illuminate\Http\Request;
use App\Models\Regional\Village;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.regional.village.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.regional.village.input', ['data' => new Village]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:villages,id',
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
        $village = new Village;
        $village->district_id = $request->district_id;
        $village->id = $request->code;
        $village->name = $request->name;
        $village->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Village Saved',
        ]);
    }
    public function show(Village $village)
    {
        //
    }
    public function edit(Village $village)
    {
        return view('pages.office.regional.village.input', ['data' => $village]);
    }
    public function update(Request $request, Village $village)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:villages,id,'.$village->id,
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
        $village->district_id = $request->district_id;
        $village->id = $request->code;
        $village->name = $request->name;
        $village->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Village Updated',
        ]);
    }
    public function destroy(Village $village)
    {
        $village->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Village Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Village::where('id','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.regional.village.list',compact('collection'));
    }
}

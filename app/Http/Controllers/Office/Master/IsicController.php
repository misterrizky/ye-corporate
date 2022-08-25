<?php

namespace App\Http\Controllers\Office\Master;

use App\Models\Master\Isic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IsicController extends Controller
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
            'name' => 'required',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('name')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }else if($errors->has('code')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('code'),
                ]);
            }
        }
        $isic = new Isic;
        $isic->isic_type_id = $request->isic_type_id;   
        $isic->name = $request->name;
        $isic->code = $request->code;
        $isic->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'ISIC Saved',
        ]);
    }
    public function show(Isic $isic)
    {
        //
    }
    public function edit(Isic $isic)
    {
        //
    }
    public function update(Request $request, Isic $isic)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('name')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }else if($errors->has('code')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('code'),
                ]);
            }
        }  
        $isic->name = $request->name;
        $isic->code = $request->code;
        $isic->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'ISIC Updated ',
        ]);
    }
    public function destroy(Isic $isic)
    {
        $isic->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'ISIC Deleted ',
        ]);
    }
}

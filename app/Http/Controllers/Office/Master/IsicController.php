<?php

namespace App\Http\Controllers\Office\Master;

use App\Models\Master\Isic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IsicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:isic-list|isic-create|isic-edit|isic-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:isic-create', ['only' => ['create','store']]);
        // $this->middleware('permission:isic-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:isic-delete', ['only' => ['destroy']]);
    }
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

        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
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

        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
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

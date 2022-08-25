<?php

namespace App\Http\Controllers\Office\Master;

use App\Models\Master\Isic;
use Illuminate\Http\Request;
use App\Models\Master\IsicType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IsicTypeController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.master.isic-type.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.master.isic-type.input',['data' => new IsicType]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('name')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
        }
        $isicType = new IsicType;
        $isicType->name = $request->name;
        $isicType->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'ISIC Type Saved',
        ]);
    }
    public function show(Request $request, IsicType $isicType)
    {
        if($request->ajax())
        {
            return view('pages.office.master.isic-type.show',compact('isicType'));
        }
        return view('pages.office.theme');
    }
    public function edit(IsicType $isicType)
    {
        return view('pages.office.master.isic-type.input',['data' => $isicType]);
    }
    public function update(Request $request, IsicType $isicType)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('name')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
        }
        $isicType->name = $request->name;
        $isicType->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'ISIC Type Updated',
        ]);
    }
    public function destroy(IsicType $isicType)
    {
        $isicType->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'ISIC Type Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = IsicType::where('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.master.isic-type.list',compact('collection'));
    }
    public function show_list(Request $request, IsicType $isicType)
    {
        $collection = Isic::where('id',$request->keyword)->orWhere('name','LIKE','%'.$request->keyword.'%')->where('isic_type_id',$isicType->id)->paginate(10);
        return view('pages.office.master.isic-type.show_list',compact('collection'));
    }
    public function show_create(IsicType $isicType)
    {
        return view('pages.office.master.isic-type.show_input', ['data' => new Isic, 'isicType' => $isicType]);
    }
    public function show_edit(IsicType $isicType, Isic $isic)
    {
        return view('pages.office.master.isic-type.show_input', ['data' => $isic, 'isicType' => $isicType]);
    }
}

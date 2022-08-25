<?php

namespace App\Http\Controllers\Office\Corporate;

use Illuminate\Http\Request;
use App\Models\Corporate\LegalDoc;
use App\Http\Controllers\Controller;
use App\Models\Corporate\LegalDocType;
use Illuminate\Support\Facades\Validator;

class LegalDocTypeController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.corporate.document-type.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        if($request->id){
            $documentType = LegalDocType::where('id',$request->id)->first();
        }else{
            $documentType = new LegalDocType;
        }
        if($request->id){
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:legal_doc_types,code,'.$documentType->id,
                'name' => 'required',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:legal_doc_types,code',
                'name' => 'required',
            ]);
        }
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('code')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('code'),
                ]);
            }elseif ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
        }
        $documentType->code = $request->code;
        $documentType->name = $request->name;
        $documentType->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Folder Saved',
        ]);
    }
    public function show(Request $request, LegalDocType $documentType)
    {
        if($request->ajax())
        {
            return view('pages.office.corporate.document-type.show',['data' => $documentType]);
        }
        return view('pages.office.theme');
    }
    public function edit(LegalDocType $documentType)
    {
        //
    }
    public function update(Request $request, LegalDocType $documentType)
    {
        //
    }
    public function destroy(LegalDocType $documentType)
    {
        $documentType->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Folder Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = LegalDocType::where('code','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->orderBy('code','ASC')->get();
        return view('pages.office.corporate.document-type.list',compact('collection'));
    }
    public function show_list(Request $request, LegalDocType $documentType)
    {
        $collection = LegalDoc::where('doc_type_id',$documentType->id)->where('code','LIKE','%'.$request->keyword.'%')->get();
        return view('pages.office.corporate.document-type.show_list',compact('collection','documentType'));
    }
}

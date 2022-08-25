<?php

namespace App\Http\Controllers\Office\Corporate;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Corporate\LegalDoc;
use App\Http\Controllers\Controller;
use App\Models\Corporate\LegalDocType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LegalDocController extends Controller
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
        if($request->id){
            $document = LegalDoc::where('id',$request->id)->first();
        }else{
            $document = new LegalDoc;
        }
        if($request->id){
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:legal_docs,code,'.$document->id,
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:legal_docs,code',
                'attachment' => 'required',
            ]);
        }
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('code')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('code'),
                ]);
            }elseif ($errors->has('attachment')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('attachment'),
                ]);
            }
        }
        $type = LegalDocType::where('id',$request->type)->first();
        $document->doc_type_id = $request->type;
        $document->code = $request->code;
        if(request()->file('attachment')){
            if($request->id){
                Storage::delete($document->attachment);
            }
            $attachment = request()->file('attachment')->store(Str::of($type->name)->slug('_'));
            $document->attachment = $attachment;
        }
        $document->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'File Saved',
        ]);
    }
    public function show(LegalDoc $legalDoc)
    {
        //
    }
    public function edit(LegalDoc $legalDoc)
    {
        //
    }
    public function update(Request $request, LegalDoc $legalDoc)
    {
        //
    }
    public function destroy(LegalDoc $document)
    {
        Storage::delete($document->attachment);
        $document->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'File Deleted',
        ]);
    }
}

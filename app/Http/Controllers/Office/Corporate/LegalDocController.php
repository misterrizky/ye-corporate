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
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:doc-list|doc-create|doc-edit|doc-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:doc-create', ['only' => ['create','store']]);
        // $this->middleware('permission:doc-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:doc-delete', ['only' => ['destroy']]);
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
        if($request->id){
            $document = LegalDoc::where('id',$request->id)->first();
            $validator = Validator::make($request->all(), [
                'code' => 'required',
            ]);
        }else{
            $document = new LegalDoc;
            $validator = Validator::make($request->all(), [
                'code' => 'required',
                'attachment' => 'required',
            ]);
        }
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
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

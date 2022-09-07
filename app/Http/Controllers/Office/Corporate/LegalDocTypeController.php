<?php

namespace App\Http\Controllers\Office\Corporate;

use Illuminate\Http\Request;
use App\Models\Corporate\LegalDoc;
use App\Http\Controllers\Controller;
use App\Models\Corporate\LegalDocType;
use Illuminate\Support\Facades\Validator;

class LegalDocTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:docType-list|docType-create|docType-edit|docType-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:docType-create', ['only' => ['create','store']]);
        // $this->middleware('permission:docType-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:docType-delete', ['only' => ['destroy']]);
    }
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
        if($request->has('id')){
            $documentType = LegalDocType::where('id',$request->id)->first();
            $validator = Validator::make($request->all(), [
                'code' => 'required',
                'name' => 'required',
            ]);
        }else{
            $documentType = new LegalDocType;
            $validator = Validator::make($request->all(), [
                'code' => 'required',
                'name' => 'required',
            ]);
        }
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $documentType->doc_type_id = $request->type ?? 0;
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
        $collection = LegalDocType::where('doc_type_id',0)->where('code','LIKE','%'.$request->keyword.'%')->orderBy('code','ASC')->get();
        return view('pages.office.corporate.document-type.list',compact('collection'));
    }
    public function show_list(Request $request, LegalDocType $documentType)
    {
        $collections = LegalDocType::with('parent')->where('doc_type_id',$documentType->id)->where('code','LIKE','%'.$request->keyword.'%')->orderBy('code','ASC')->get();
        $collection = LegalDoc::where('doc_type_id',$documentType->id)->where('code','LIKE','%'.$request->keyword.'%')->orderBy('code','ASC')->get();
        return view('pages.office.corporate.document-type.show_list',compact('collections','collection','documentType'));
    }
}

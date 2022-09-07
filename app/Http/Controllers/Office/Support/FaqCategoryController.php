<?php

namespace App\Http\Controllers\Office\Support;

use App\Models\Support\Faq;
use Illuminate\Http\Request;
use App\Models\Support\FaqCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FaqCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:faqCategory-list|faqCategory-create|faqCategory-edit|faqCategory-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:faqCategory-create', ['only' => ['create','store']]);
        // $this->middleware('permission:faqCategory-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:faqCategory-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.support.faq.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.support.faq.input', ['data' => new FaqCategory]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:faq_categories,name',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $faq = new FaqCategory;
        $faq->name = $request->name;
        $faq->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Faq Category Created',
        ]);
    }
    public function show(Request $request, FaqCategory $faq)
    {
        if($request->ajax())
        {
            return view('pages.office.support.faq.show',['data' => $faq]);
        }
        return view('pages.office.theme');
    }
    public function edit(FaqCategory $faq)
    {
        return view('pages.office.support.faq.input', ['data' => $faq]);
    }
    public function update(Request $request, FaqCategory $faq)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:faq_categories,name,'.$faq->id,
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $faq->name = $request->name;
        $faq->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Faq Category Updated',
        ]);
    }
    public function destroy(FaqCategory $faq)
    {
        $faq->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Faq Category Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = FaqCategory::get();
        return view('pages.office.support.faq.list', compact('collection'));
    }
    public function show_list(Request $request, FaqCategory $faq)
    {
        $collection = Faq::where('faq_category_id',$faq->id)->get();
        return view('pages.office.support.faq.show_list', compact('collection','faq'));
    }
    public function show_create(FaqCategory $faq)
    {
        return view('pages.office.support.faq.show_input', ['data' => new Faq, 'faq' => $faq]);
    }
    public function show_edit(FaqCategory $faq, Faq $faqs)
    {
        return view('pages.office.support.faq.show_input', ['data' => $faqs, 'faq' => $faq]);
    }
}
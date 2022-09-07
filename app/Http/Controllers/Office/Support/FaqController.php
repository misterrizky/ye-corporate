<?php

namespace App\Http\Controllers\Office\Support;

use App\Models\Support\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
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
            'question' => 'required|unique:faqs,question',
            'answer' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $faq = new Faq;
        $faq->faq_category_id = $request->category;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Faq Created',
        ]);
    }
    public function show(Faq $faq)
    {
        //
    }
    public function edit(Faq $faq)
    {
        //
    }
    public function update(Request $request, Faq $faq)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|unique:faqs,question,'.$faq->id,
            'answer' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Faq Updated',
        ]);
    }
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Faq Deleted',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Office\Corporate;

use Illuminate\Http\Request;
use App\Models\Corporate\History;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:department-create', ['only' => ['create','store']]);
        // $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.corporate.history.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.corporate.history.input', ['data' => new History]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|unique:histories,year',
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $history = new History;
        $history->year = $request->year;
        $history->title = $request->title;
        $history->description = $request->description;
        $history->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'History Created',
        ]);
    }
    public function show(History $history)
    {
        //
    }
    public function edit(History $history)
    {
        return view('pages.office.corporate.history.input', ['data' => $history]);
    }
    public function update(Request $request, History $history)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|unique:histories,year,'.$history->id,
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $history->year = $request->year;
        $history->title = $request->title;
        $history->description = $request->description;
        $history->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'History Updated',
        ]);
    }
    public function destroy(History $history)
    {
        $history->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'History Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = History::get();
        return view('pages.office.corporate.history.list', compact('collection'));
    }
}

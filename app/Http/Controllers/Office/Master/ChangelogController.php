<?php

namespace App\Http\Controllers\Office\Master;

use Illuminate\Http\Request;
use App\Models\Master\Changelog;
use App\Http\Controllers\Controller;
use App\Models\Master\ChangelogDetail;
use Illuminate\Support\Facades\Validator;

class ChangelogController extends Controller
{
    public function __construct()
    {
        // 
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            return view('pages.office.master.changelog.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.master.changelog.input',['data' => new Changelog]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $changelog = new Changelog;
        $changelog->name = $request->name;
        $changelog->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Commit Created',
        ]);
    }
    public function show(Request $request, Changelog $changelog)
    {
        if($request->ajax()){
            return view('pages.office.master.changelog.show', ['data' => $changelog]);
        }
        return view('pages.office.theme');
    }
    public function edit(Changelog $changelog)
    {
        return view('pages.office.master.changelog.input',['data' => $changelog]);
    }
    public function update(Request $request, Changelog $changelog)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $changelog->name = $request->name;
        $changelog->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Commit Updated',
        ]);
    }
    public function destroy(Changelog $changelog)
    {
        $changelog->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Commit Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Changelog::orderBy('id','desc')->get();
        return view('pages.office.master.changelog.list',['collection' => $collection]);
    }
    public function show_list(Request $request, Changelog $changelog)
    {
        $collection = ChangelogDetail::where('changelog_id',$changelog->id)->get();
        return view('pages.office.master.changelog.show_list',['data' => $changelog,'collection' => $collection]);
    }
    public function show_create(Changelog $changelog)
    {
        return view('pages.office.master.changelog.show_input',['data' => new ChangelogDetail, 'changelog' => $changelog]);
    }
    public function show_edit(Changelog $changelog, ChangelogDetail $detail)
    {
        return view('pages.office.master.changelog.show_input',['data' => $detail, 'changelog' => $changelog]);
    }
}

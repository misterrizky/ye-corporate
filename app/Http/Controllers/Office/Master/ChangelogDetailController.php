<?php

namespace App\Http\Controllers\Office\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\ChangelogDetail;
use Illuminate\Support\Facades\Validator;

class ChangelogDetailController extends Controller
{
    public function __construct()
    {
        // 
    }
    public function index(Request $request)
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
            'changelog_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $detail = new ChangelogDetail;
        $detail->changelog_id = $request->changelog_id;
        $detail->title = $request->title;
        $detail->description = $request->description;
        $detail->url = $request->url;
        $detail->type = $request->type;
        $detail->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Changelog Saved',
        ]);
    }
    public function show(ChangelogDetail $changelogDetail)
    {
        //
    }
    public function edit(ChangelogDetail $changelogDetail)
    {
        //
    }
    public function update(Request $request, ChangelogDetail $changelogDetail)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $changelogDetail->title = $request->title;
        $changelogDetail->description = $request->description;
        $changelogDetail->url = $request->url;
        $changelogDetail->type = $request->type;
        $changelogDetail->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Changelog Updated',
        ]);
    }
    public function destroy(ChangelogDetail $changelogDetail)
    {
        $changelogDetail->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Changelog Deleted',
        ]);
    }
}

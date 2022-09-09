<?php

namespace App\Http\Controllers\Office\Master;

use Illuminate\Http\Request;
use App\Models\Master\Changelog;
use App\Http\Controllers\Controller;
use App\Models\Master\ChangelogDetail;
use Illuminate\Support\Facades\Validator;

class ChangelogDetailController extends Controller
{
    public function __construct()
    {
        //
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request, Changelog $changelog)
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
        $changelog = new ChangelogDetail;
        $changelog->changelog_id = $changelog->id;
        $changelog->title = $request->title;
        $changelog->description = $request->description;
        $changelog->url = $request->url;
        $changelog->type = $request->type;
        $changelog->save();
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

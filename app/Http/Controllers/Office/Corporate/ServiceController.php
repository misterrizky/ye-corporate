<?php

namespace App\Http\Controllers\Office\Corporate;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Corporate\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        // 
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            return view('pages.office.corporate.service.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.corporate.service.input',['data' => new Service]);
    }
    public function store(Request $request)
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
        $service = new Service;
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->description = $request->description;
        if(request()->file('thumbnail')){
            $thumbnail = request()->file('thumbnail')->store('service');
            $service->thumbnail = $thumbnail;
        }
        $service->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Service Created',
        ]);
    }
    public function show(Service $service)
    {
        //
    }
    public function edit(Service $service)
    {
        return view('pages.office.corporate.service.input',['data' => $service]);
    }
    public function update(Request $request, Service $service)
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
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->description = $request->description;
        if(request()->file('thumbnail')){
            Storage::delete($service->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('service');
            $service->thumbnail = $thumbnail;
        }
        $service->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Service Updated',
        ]);
    }
    public function destroy(Service $service)
    {
        if($service->thumbnail){
            Storage::delete($service->thumbnail);
        }
        $service->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Service Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Service::get();
        return view('pages.office.corporate.service.list',['collection' => $collection]);
    }
}

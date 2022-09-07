<?php

namespace App\Http\Controllers\Office\HRM;

use Illuminate\Http\Request;
use App\Models\HRM\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','show']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.setting.permission.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.setting.permission.input',['data' => new Permission]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->guard_name = 'employees';
        $permission->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Permission Created',
        ]);
    }
    public function show(Permission $permission)
    {
        //
    }
    public function edit(Permission $permission)
    {
        return view('pages.office.setting.permission.input',['data' => $permission]);
    }
    public function update(Request $request, Permission $permission)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name,'.$permission->id,
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $permission->name = $request->name;
        $permission->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Permission Updated',
        ]);
    }
    public function destroy(Permission $permission)
    {
        //
    }
    public function list(Request $request)
    {
        $collection = Permission::where('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.setting.permission.list', compact('collection'));
    }
}

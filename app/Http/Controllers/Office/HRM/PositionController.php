<?php

namespace App\Http\Controllers\Office\HRM;

use App\Models\HRM\Position;
use Illuminate\Http\Request;
use App\Models\HRM\Permission;
use App\Models\Setting\Module;
use App\Models\HRM\RolePermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:position-list|position-create|position-edit|position-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:position-create', ['only' => ['create','store']]);
        // $this->middleware('permission:position-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:position-delete', ['only' => ['destroy']]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:positions,name',
            'desc' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $position = new Position;
        $position->department_id = $request->department;
        $position->name = $request->name;
        $position->desc = $request->desc;
        $position->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Position Created',
        ]);
    }
    public function show(Position $position)
    {
        //
    }
    public function edit(Position $position)
    {
        //
    }
    public function update(Request $request, Position $position)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:positions,name,'.$position->id,
            'desc' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $position->name = $request->name;
        $position->desc = $request->desc;
        $position->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Position Updated',
        ]);
    }
    public function destroy(Position $position)
    {
        Permission::where('position_id',$position->id)->delete();
        $position->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Position Deleted',
        ]);
    }
    public function show_create(Position $position)
    {
        // dd(RolePermission::where('permission_id',1)->where('role_id',4)->first()->permission_id);
        $modules = Permission::get();
        return view('pages.office.hrm.position.show_input', ['data' => new RolePermission, 'position' => $position, 'modules' => $modules]);
    }
    public function show_edit(Position $position,RolePermission $rolePermission)
    {
        $modules = Permission::get();
        return view('pages.office.hrm.position.show_input', ['data' => $rolePermission, 'position' => $position, 'modules' => $modules]);
    }
    
}

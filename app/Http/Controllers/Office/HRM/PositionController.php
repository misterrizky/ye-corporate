<?php

namespace App\Http\Controllers\Office\HRM;

use App\Models\HRM\Position;
use Illuminate\Http\Request;
use App\Models\HRM\Permission;
use App\Models\Setting\Module;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
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
            'name' => 'required|unique:positions,name',
            'desc' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('desc')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('desc'),
                ]);
            }
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
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('desc')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('desc'),
                ]);
            }
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
        $modules = Module::where('module_id',0)->get();
        return view('pages.office.hrm.position.show_input', ['data' => new Permission, 'position' => $position, 'modules' => $modules]);
    }
    public function show_edit(Position $position, Permission $permission)
    {
        $modules = Module::where('module_id',0)->get();
        return view('pages.office.hrm.position.show_input', ['data' => $permission, 'position' => $position, 'modules' => $modules]);
    }
    
}

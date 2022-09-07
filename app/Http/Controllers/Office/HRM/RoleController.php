<?php

namespace App\Http\Controllers\Office\HRM;

use App\Models\HRM\Position;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        // 
    }
    public function store(Request $request)
    {
        $position = Position::where('id',$request->position)->first();
        $role = Role::where('id',$request->position)->first();
        $role->syncPermissions($request->input('permission'));
        return response()->json([
            'alert' => 'success',
            'message' => 'Role Saved',
            'redirect' => 'main',
            'route' => route('office.hrm.department.show',$position->department->id)
        ]);
    }
}

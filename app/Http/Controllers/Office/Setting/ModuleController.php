<?php

namespace App\Http\Controllers\Office\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.setting.module.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Module $module)
    {
        //
    }
    public function edit(Module $module)
    {
        //
    }
    public function update(Request $request, Module $module)
    {
        //
    }
    public function destroy(Module $module)
    {
        //
    }
    public function list(Request $request)
    {
        $collection = Module::paginate(10);
        return view('pages.office.setting.module.list', compact('collection'));
    }
    public function show_list(Request $request, Department $department)
    {
        $collection = $department->position;
        return view('pages.office.hrm.department.show_list', compact('collection'));
    }
    public function show_create(Department $department)
    {
        return view('pages.office.hrm.department.show_input', ['data' => new Position, 'department' => $department]);
    }
    public function show_edit(Department $department, Position $position)
    {
        return view('pages.office.hrm.department.show_input', ['data' => $position, 'department' => $department]);
    }
}

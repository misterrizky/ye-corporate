<?php

namespace App\Http\Controllers\Office\Project;

use App\Models\CRM\Client;
use Illuminate\Http\Request;
use App\Models\Project\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            return view('pages.office.project.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        $client = Client::get();
        return view('pages.office.project.create',['data'=>new Project,'client'=>$client]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'amout' => 'required',
            'start_at' => 'required',
        ]);
    }
    public function show(Request $request, Project $project)
    {
        if($request->ajax()){
            return view('pages.office.project.show',['data'=>$project]);
        }
        return view('pages.office.theme');
    }
    public function edit(Project $project)
    {
        return view('pages.office.project.edit',['data'=>$project]);
    }
    public function update(Request $request, Project $project)
    {
        //
    }
    public function destroy(Project $project)
    {
        //
    }
    public function list(Request $request)
    {
        $collection = Project::get();
        return view('pages.office.project.list',['collection'=>$collection]);
    }
    public function show_list(Request $request)
    {
        $collection = Project::get();
        return view('pages.office.project.show_list',['collection'=>$collection]);
    }
}

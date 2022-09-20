<?php

namespace App\Http\Controllers\Office\CRM;

use App\Models\CRM\Client;
use Illuminate\Http\Request;
use App\Models\CRM\ContactGroup;
use App\Http\Controllers\Controller;
use App\Models\Master\CompanyIndustry;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.crm.client.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        $collection = Client::get();
        $industry = CompanyIndustry::get();
        $group = ContactGroup::get();
        return view('pages.office.crm.client.input', ['data' => new Client, 'collection' => $collection, 'group' => $group, 'industry' => $industry]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'group' => 'required',
            'industry' => 'required',
            'name' => 'required',
            'phone' => 'required|unique:clients,phone',
            'email' => 'required|unique:clients,email',
        ]);
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

    }
    public function show(Client $client)
    {
        //
    }
    public function edit(Client $client)
    {
        //
    }
    public function update(Request $request, Client $client)
    {
        //
    }
    public function destroy(Client $client)
    {
        //
    }
    public function list(Request $request)
    {
        $collection = Client::paginate(10);
        return view('pages.office.crm.client.list', compact('collection'));
    }
}

<?php

namespace App\Http\Controllers\Office\CRM;

use App\Http\Controllers\Controller;
use App\Models\CRM\Client;
use Illuminate\Http\Request;

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
        //
    }
    public function store(Request $request)
    {
        //
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

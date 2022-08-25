<?php

namespace App\Http\Controllers\Office\CRM;

use App\Http\Controllers\Controller;
use App\Models\CRM\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.crm.newsletter.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.crm.newsletter.input');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Newsletter $newsletter)
    {
        //
    }
    public function edit(Newsletter $newsletter)
    {
        //
    }
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }
    public function destroy(Newsletter $newsletter)
    {
        //
    }
    public function list(Request $request)
    {
        $collection = Newsletter::where('email','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.crm.newsletter.list', compact('collection'));
    }
}

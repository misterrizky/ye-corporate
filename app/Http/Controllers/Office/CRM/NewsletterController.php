<?php

namespace App\Http\Controllers\Office\CRM;

use App\Http\Controllers\Controller;
use App\Models\CRM\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:newsletter-list|newsletter-create|newsletter-edit|newsletter-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:newsletter-create', ['only' => ['create','store']]);
        // $this->middleware('permission:newsletter-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:newsletter-delete', ['only' => ['destroy']]);
    }
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

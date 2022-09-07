<?php

namespace App\Http\Controllers\Office\Master;

use App\Models\Master\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:bank-list|bank-create|bank-edit|bank-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:bank-create', ['only' => ['create','store']]);
        // $this->middleware('permission:bank-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:bank-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.master.bank.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.master.bank.input', ['data' => new Bank]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|max:100',
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $bank = new Bank;
        $bank->code = $request->code;
        $bank->name = $request->name;
        $bank->is_activated = 0;
        $bank->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Bank Saved',
        ]);
    }
    public function show(Bank $bank)
    {
        //
    }
    public function edit(Bank $bank)
    {
        return view('pages.office.master.bank.input', ['data' => $bank]);
    }
    public function update(Request $request, Bank $bank)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|max:100',
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $bank->code = $request->code;
        $bank->name = $request->name;
        $bank->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Bank Updated',
        ]);
    }
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Bank Deleted',
        ]);
    }
    public function list(Request $request)
    {
        $collection = Bank::where('code','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->paginate(10);
        return view('pages.office.master.bank.list',compact('collection'));
    }
}

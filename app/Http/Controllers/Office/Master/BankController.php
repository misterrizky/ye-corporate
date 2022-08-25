<?php

namespace App\Http\Controllers\Office\Master;

use App\Models\Master\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
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

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('code')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('code'),
                ]);
            }else if($errors->has('name')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
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

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('code')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('code'),
                ]);
            }else if($errors->has('name')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
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

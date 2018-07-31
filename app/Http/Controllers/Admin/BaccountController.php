<?php

namespace App\Http\Controllers\Admin;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accounts = BankAccount::all();
        return view('admin.bankaccounts.index')->with('accounts',$accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,array(
           'name' => 'required',
            'name_ar' => 'required',
            'number' => 'required',
            'type' => 'required',
            'view' => 'required'
        ));
        $data = new BankAccount();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->num = $request->number;
        $data->type = $request->type;
        $data->view= $request->view;
        $data->save();

        session()->flash('message','Bank Account Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        BankAccount::destroy($id);
        session()->flash('message','Account Deleted Successfully');
        return redirect()->back();
    }
}

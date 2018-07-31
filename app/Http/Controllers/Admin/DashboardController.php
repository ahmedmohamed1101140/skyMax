<?php

namespace App\Http\Controllers\Admin;

use App\Models\NetworkSeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = NetworkSeting::all()->first();
        return view('admin.dashboard.create',compact('data'));
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
           'max_out' => 'required',
           'acc_price' => 'required',
           'activation_price' => 'required',
            'charge' => 'required',
            'direct_commission' => 'required',
            'binary_commission' => 'required'
        ));
        $data = NetworkSeting::all()->first();
        $data->maxout = $request->max_out;
        $data->account_price = $request->acc_price;
        $data->price_activeaccount = $request->activation_price;
        $data->charges = $request->charge;
        $data->direct_commission = $request->direct_commission;
        $data->binary_commission = $request->binary_commission;

        $data->save();

        session()->flash('message','Site Data Updated Successfully');
        return redirect()->back();


    }

    public function add_social_link(Request $request){
        $this->validate($request,array(
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'instagram' => 'required',
            'google' => 'required'
        ));

        $data = NetworkSeting::all()->first();
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->linkedin = $request->linkedin;
        $data->instagram = $request->instagram;
        $data->google = $request->google;

        $data->save();

        session()->flash('message','Social Links Updated Successfully');
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
    }
}

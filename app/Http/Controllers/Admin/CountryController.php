<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::all();
        return view("admin.countries.index",compact('countries'));
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
        $this->validate($request,array(
           'name' => 'required',
            'name_ar' => 'required',
            'number' => 'required',
            'price' => 'required',
            'charges' => 'required',
            'view' => 'required',
        ));

        $data = new Country();
        $data->name =  $request->name;
        $data->name_ar =  $request->name_ar;
        $data->national_id =  $request->number;
        $data->view =  $request->view;
        $data->account_price =  $request->price;
        $data->charges =  $request->charges;
        $data->save();

        session()->flash('message','Country Added Successfully');
        return redirect()->back();
        //
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
        dd($id);
        Country::destroy($id);
        session()->flash('message','Country Deleted Successfully');
        return redirect()->back();
    }
}

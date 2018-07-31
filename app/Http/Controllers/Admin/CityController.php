<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::paginate(10);
        return view("admin.cities.index")->with("cities",$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cities.create');
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
            'name'=>'required',
            'namear' => 'required',
            'view'=>'required'
        ));

        $city = new City();
        $city->name_eng = $request->name;
        $city->name = $request->namear;
        $city->view = $request->view;
        $city->save();

        session()->flash('message','City Created successfully');
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
        $city = City::find($id);
        return view('admin.cities.edit',compact('city'));
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
        $this->validate($request,array(
           'name'=>'required',
            'namear' => 'required'
        ));

        $city = City::find($id);
        $city->name_eng = $request->name;
        $city->name = $request->namear;

        if($request->view !== null){
            $city->view = $request->view;
        }
        $city->save();
        session()->flash('message','City Updated successfully');
        return redirect()->back();
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
        City::destroy($id);
        session()->flash('message','City deleted successfully');
        return redirect()->back();
    }
}

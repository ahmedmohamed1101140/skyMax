<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $states = State::all();
        return view('admin.states.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::all()->where('view','=','1');
        return view('admin.states.create',compact('cities'));
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
            'view' => 'required',
            'city' => 'required',
        ));

        $state = new State();
        $state->name_eng = $request->name;
        $state->name = $request->name_ar;
        $state->view = $request->view;
        $state->country_id = $request->city;
        $state->save();

        session()->flash('message','State Created successfully');
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
        $state = State::find($id);
        $cities = City::all()->where('view','=','1');
        return view('admin.states.edit',compact('cities','state'));

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
            'name_ar'=>'required',

        ));

        $state = State::find($id);
        $state->name_eng = $request->name;
        $state->name = $request->name_ar;

        if($request->view !== null){
            $state->view = $request->view;
        }
        if($request->city){
            $state->country_id = $request->city;
        }
        $state->save();
        session()->flash('message','State Updated successfully');
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
        State::destroy($id);
        session()->flash('message','State Deleted successfully');
        return redirect()->back();
    }
}

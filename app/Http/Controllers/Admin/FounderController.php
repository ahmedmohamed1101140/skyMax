<?php

namespace App\Http\Controllers\Admin;

use App\Models\Founder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FounderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $founders = Founder::all();
        return view('admin.founders.index',compact('founders'));
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
//        dd($request->all());
        $this->validate($request,array(
            'name' => 'required',
            'name_ar' => 'required',
            'position' => 'required',
            'position_ar' => 'required',
            'image_url' => 'required',
        ));
        $founder = new Founder();
        $founder->name = $request->name;
        $founder->position = $request->position;
        $founder->name_ar = $request->name_ar;
        $founder->position_ar = $request->position_ar;

        $dir = public_path().'/images/founders/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $founder->image = $fileName ;

        $founder->save();
        session()->flash('message','Founder Created successfully');
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
//        dd($id);
        Founder::destroy($id);
        session()->flash('message','Founder Deleted successfully');
        return redirect()->back();
    }
}

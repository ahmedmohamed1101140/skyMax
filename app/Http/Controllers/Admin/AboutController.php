<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = About::all()->first();
        return view('admin.about.index',compact('data'));

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
           'p' => 'required',
            'h1' => 'required',
            'p1' => 'required',
            'h2' => 'required',
            'p2' => 'required',
            'h3' => 'required',
            'p3' => 'required',
            'p_ar' => 'required',
            'h1_ar' => 'required',
            'p1_ar' => 'required',
            'h2_ar' => 'required',
            'p2_ar' => 'required',
            'h3_ar' => 'required',
            'p3_ar' => 'required',
        ));

        $data = About::all()->first();
        $data->main_paragraph = $request->p;
        $data->h1 = $request->h1;
        $data->p1 = $request->p1;
        $data->h2 = $request->h2;
        $data->p2 = $request->p2;
        $data->h3 = $request->h3;
        $data->p3 = $request->p3;
        $data->main_paragraph_ar = $request->p_ar;
        $data->h1_ar = $request->h1_ar;
        $data->p1_ar = $request->p1_ar;
        $data->h2_ar = $request->h2_ar;
        $data->p2_ar = $request->p2_ar;
        $data->h3_ar = $request->h3_ar;
        $data->p3_ar = $request->p3_ar;


        $dir = public_path().'/images/';

        if($request->image_url1 !== null){
            $file = $request->file('image_url1') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $data->img1 = $fileName ;
        }

        if($request->image_url2 !== null){
            $file = $request->file('image_url2') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $data->img2 = $fileName ;
        }

        if($request->image_url3 !== null){
            $file = $request->file('image_url3') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $data->img3 = $fileName ;
        }



        $data->save();
        session()->flash('message','About Us updated successfully');
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

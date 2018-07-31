<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sliders.create');
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
            'title' =>'required',
            'title_ar' =>'required',
            'view' =>'required',
            'description' =>'required',
            'description_ar' =>'required',
            'details' =>'required',
            'details_ar' =>'required',
            'image_url' => 'required'
        ));

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->title_ar = $request->title_ar;
        $slider->descriptioneng = $request->description;
        $slider->description = $request->description_ar;
        $slider->details = $request->details;
        $slider->details_ar = $request->details_ar;
        $slider->view = $request->view;

        $dir = public_path().'/images/slider/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $slider->img = $fileName ;

        $slider->save();
        session()->flash('message','Slider Created successfully');
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
        $slider = Slider::find($id);
        return view('admin.sliders.edit',compact('slider'));
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
            'title' =>'required',
            'description' =>'required',
            'details' =>'required',
            'title_ar' =>'required',
            'description_ar' =>'required',
            'details_ar' =>'required',
        ));

        $slider = Slider::find($id);
        if($request->image_url !== null){
            $dir = public_path().'/images/slider/';
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $slider->img = $fileName ;
        }
        if($request->view !== null){
            $slider->view = $request->view;
        }
        $slider->title = $request->title;
        $slider->descriptioneng = $request->description;
        $slider->details = $request->details;
        $slider->title_ar = $request->title_ar;
        $slider->description = $request->description_ar;
        $slider->details_ar = $request->details_ar;
        $slider->save();

        session()->flash('message','Slider Updated successfully');
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
        Slider::destroy($id);
        session()->flash('message','Slider Deleted successfully');
        return redirect()->back();
    }
}

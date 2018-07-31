<?php

namespace App\Http\Controllers\Admin;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Events::all();
        return view('admin.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.events.create');
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

            'location' => 'required',
            'location_ar' => 'required',

            'description' => 'required',
            'description_ar' => 'required',
            'view' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'image_url' => 'required',
        ));

        $event = new Events();
        $event->name = $request->name;
        $event->name_ar = $request->name_ar;

        $event->location = $request->location;
        $event->location_ar = $request->location_ar;

        $event->details = $request->description;
        $event->details_ar = $request->description_ar;

        $event->status = $request->view;
        $event->date = $request->date;
        $event->from_date = $request->from;
        $event->to_date = $request->to;

        $dir = public_path().'/images/events/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $event->image = $fileName ;

        $event->save();
        session()->flash('message','Event Created successfully');
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
        $event = Events::find($id);
        return view('admin.events.show',compact('event'));
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
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'name_ar' => 'required',
            'location_ar' => 'required',
            'description_ar' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
        ));

        $event = Events::find($id);
        $event->name = $request->name;
        $event->location = $request->location;
        $event->details = $request->description;
        $event->name_ar = $request->name_ar;
        $event->location_ar = $request->location_ar;
        $event->details_ar = $request->description_ar;
        $event->date = $request->date;
        $event->from_date = $request->from;
        $event->to_date = $request->to;

        if($request->view !== null){
            $event->status = $request->view;
        }
        if($request->image_url !== null){
            $dir = public_path().'/images/events/';
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $event->image = $fileName ;
        }
        $event->save();
        session()->flash('message','Event Updated successfully');
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
        dd($id);
        Events::destroy($id);
        session()->flash('message','Event Deleted successfully');
        return redirect()->back();
    }
}

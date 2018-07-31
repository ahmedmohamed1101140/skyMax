<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $messages = ContactUs::paginate(20);
        return view('admin.messages.index',compact('messages'));
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
        $message = ContactUs::find($id);
        if($message->view == '0'){
            $message->view = '1';
            $message->save();
        }
        return view('admin.messages.show',compact('message'));
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
        ContactUs::destroy($id);
        session()->flash('message','Message Deleted successfully');
        return redirect()->back();
    }

    public function filter(Request $request){
        $items = ContactUs::where('id', '!=', 0);

        if($request->name !== null){
            $items->Where('name', 'LIKE', '%' . $request->name . '%');

        }
        if($request->mail !== null){
            $items->Where('mail','=',$request->mail);
        }

        if($request->phone !== null){
            $items->Where('phone','=',$request->phone);
        }

        if($request->subject !== null){
            $items->Where('subject','LIKE','%'.$request->subject.'%');
        }

        if($request->message !== null){
            $items->Where('message','LIKE','%'.$request->message.'%');
        }
        $messages = $items->paginate(20);
        return view('admin.messages.index',compact('messages'));



    }

}

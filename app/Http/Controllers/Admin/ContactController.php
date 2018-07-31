<?php
namespace App\Http\Controllers\Admin;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ContactInfo::all()->first();
        return view('admin.contacts.index',compact('data'));
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
           'phone' => 'required',
            'phone2' => 'required',
            'mail' => 'required',
            'fax' => 'required',
            'address' => 'required',
            'address_ar' => 'required',
            'manager' => 'required',
            'manager_ar' => 'required',
            'p1' => 'required',
            'p2' => 'required',
            'ar_p1' => 'required',
            'ar_p2' => 'required',
        ));
        $data = ContactInfo::all()->first();
        $data->phone = $request->phone;
        $data->phone2 = $request->phone2;
        $data->mail = $request->mail;
        $data->fax = $request->fax;
        $data->eng_address = $request->address;
        $data->ar_address = $request->address_ar;
        $data->sales_manager = $request->manager;
        $data->ar_sales_manager = $request->manager_ar;
        $data->p1 = $request->p1;
        $data->p2= $request->p2;
        $data->p1_ar = $request->ar_p1;
        $data->p2_ar= $request->ar_p2;
        $data->save();
        session()->flash('message','Contact Info Updated Successfully');
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

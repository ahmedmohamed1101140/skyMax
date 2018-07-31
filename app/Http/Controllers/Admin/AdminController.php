<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\ChatMessages;
use App\Models\Friend;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::paginate(10);
        $roles = Role::all();
        return view('admin.admins.index',compact('roles','admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admins.create');
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
            'mail'=>'required',
            'password'=>'required',
            'view'=>'required',
        ));

        $admin = Admin::where('mail','=',$request->mail)->first();
        if($admin){
            session()->flash('message','Duplicate Mail Found For Admin '.$request->mail);
            return redirect()->back()->withInput($request->all());
        }

        $admin = new Admin();
        $admin->username =$request->name;
        $admin->mail =$request->mail;
        $admin->password =Hash::make($request->password);
        $admin->view =$request->view;
        $admin->save();

        session()->flash('message','Admin Added successfully');
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
        $admin = Admin::find($id);
        return view('admin.admins.edite',compact('admin'));

    }

    public function send_message(Request $request){

        $this->validate($request,array(
            'user_id' => 'required',
            'message' => 'required'
        ));
        $friend = Friend::all()->where('user_id','=',$request->user_id)->where('friend_id','=','-1')->first();
        if($friend){
            $message = new ChatMessages();
            $message->message = $request->message;
            $message->msg_from = '-1';
            $message->conv_id = $friend->conv_id;
            $message->save();
        }
        else{
            $friend = new Friend();
            $friend->user_id = $request->user_id;
            $friend->friend_id = '-1';
            $friend->conv_id = Carbon::now()->timestamp;
            $friend->save();
            $message = new ChatMessages();
            $message->message = $request->message;
            $message->msg_from = '-1';
            $message->conv_id = $friend->conv_id;
            $message->save();
        }

        session()->flash('message','Message Sent');
        return redirect()->back();
    }

    public function profile(){
        return view('admin.admins.profile');
    }
    public function update_profile(Request $request){

        $admin = Admin::find(auth()->user()->id);
        $admin->username = $request->username;
        $admin->mail = $request->mail;
        if($request->old_password !== null && $request->new_password !== null){
            if(Hash::check($request->old_password,$admin->password)){
                $admin->password = Hash::make($request->new_password);
            }
            else{
                session()->flash('error','Sorry Wrong Password');
                return redirect()->back();
            }
        }
        if($request->image_url){
            //upload image to server directory to service
            $dir = public_path().'/images/admin/';
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $admin->image = $fileName ;
        }
        $admin->save();
        session()->flash('message','Profile Updated Successfully');
        return redirect()->back();
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
        if($request->assign == null){
            $this->validate($request,array(
               'role' => 'required'
            ));
            $admin = Admin::find($id);
            $admin->type = $request->role;
            $admin->save();
            session()->flash('message','Admin Role Assigned successfully');
            return redirect()->back();
        }
        //
        $this->validate($request,array(
           'name' => 'required',
            'mail' => 'required'
        ));

        $admin = Admin::find($id);
        $admin->username = $request->name;
        $admin->mail = $request->mail;
        if($request->view !== null){
            $admin->view = $request->view;
        }
        if($admin->type !== null){
            $admin->type = $request->type;
        }
        if($request->password !== null && $request->new_password !== null){
            if(Hash::check($request->password,$admin->password)){
                $admin->password = Hash::make($request->new_password);
            }
            else{
                session()->flash('message','Incorrect Admin Password');
                return redirect()->back();
            }
        }
        $admin->save();
        session()->flash('message','Admin updated successfully');
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
        Admin::destroy($id);
        session()->flash('message','Admin Deleted successfully');
        return redirect()->back();
    }
}

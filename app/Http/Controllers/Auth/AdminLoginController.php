<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }



    public function showLoginForm(){
        return view('admin.auth.admin-login');
    }

    public function login(Request $request){
        $this->validate($request,array(
             'mail' => 'required|email',
            'password' => 'required|min:5'
        ));

        if(Auth::guard('admin')->attempt(['mail' => $request->mail,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }
        else{
            return redirect()->back()->withInput($request->only('mail','password'));
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/dashboard');
    }
}

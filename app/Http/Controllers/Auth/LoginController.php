<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Visiting;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userLogout');
    }

    public function showLoginForm()
    {
        return redirect('/');
    }

    public function username()
    {
        return 'username';
    }

    public function userLogout()
    {
        $visitor = Visiting::all()->where('user_id','=',Auth::user()->id)->first();
        if($visitor){
            Visiting::destroy($visitor->id);
        }
        Auth::guard('web')->logout();
        return redirect('/');
    }
}

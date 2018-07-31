<?php

namespace App\Http\Controllers\Auth;

use App\Models\Country;
use App\Models\State;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

//            'name' => 'required|string|max:255',
//            'mid_name' => 'required|string|max:255',
//            'last_name' => 'required|string|max:255',
//
//            'country' => 'required',
//            'state'   => 'required',
//            'city'    => 'required|string',
//
//            'position' => 'required',
//            'address'  => 'required|string',
//            'Nationaid' => 'required|unique:client',
//
//            'phone'    => 'required',
//            'username' => 'required|string|max:225|unique:client',
//            'mail' => 'required|string|email|max:255|unique:client',
//
//            'beneficiary' => 'required|string|max:225',
//            'relation' => 'required|string|max:225',
//
//            'password' => 'required|string|min:6|confirmed',
//            'inside_password' => 'required|string|min:6|confirmed'

        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $nextyear = Carbon::now()->addYear();

        $user = User::create([
            'fname' => $data['name'],
            'sname' => $data['middle_name'],
            'lname' => $data['last_name'],
            'mail' => $data['mail'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'address'  => $data['address'],
            'state' => State::where('id',$data['state'])->first()->name_eng,
            'country' => Country::where('id',$data['country'])->first()->name,
            'city' => $data['city'],
            'dateofbirth' => $data['birth_date'],
            'text_password' => $data['password'],
            'Nationaid' => $data['Nationaid'],
            'beneficiary' => $data['beneficiary'],
            'relation' => $data['relation'],
            'usercode' => 'EG'.Carbon::now()->timestamp,
            'id_add' => 0,
            'parent_id' => 0,
            'epin' => 0,
            'emoney' => 0,
            'statics_date' => Carbon::now(),
            'date' => Carbon::now(),
            'activation' => 0,
            'view' => '1',
            'renew_date' => $nextyear,
        ]);
        if($data['position'] == 1){
            $user->pleft = 1;
        }
        else if($data['position'] == 2){
            $user->pright = 1;
        }
        $user->password = Hash::make($data['password']);
        $user->pincode = $data['inside_password'];
        $user->save();
        return $user;
    }
}
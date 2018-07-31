<?php

namespace App\Http\Controllers;

use App\Models\Epin;
use App\Models\NetworkSeting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $client = User::find(1);
        return view('site.team',['user' => $client]);
    }

    public function update_profile(Request $request){
        $user = auth()->user();
        if($request->old_password && $request->new_password){
            if(Hash::check($request->old_password, auth()->user()->password)){
                $user->password = Hash::make($request->new_password);
            }
            else{
                session()->flash('error','password Dis match');
                return redirect()->back();
            }
        }
        if($request->old_pincode && $request->new_pincode){
            if($request->old_pincode == auth()->user()->pincode){
                $user->pincode = $request->new_pincode;
            }
            else{
                session()->flash('error','pin code Dis match');
                return redirect()->back();
            }
        }
        session()->flash('message','Passwords Changes');
        return redirect()->back();
    }

    public function renew_account(Request $request){
        //1- check the balance of the renew
        $main_data = NetworkSeting::all()->first();
        if(auth()->user()->epin >= $main_data->price_activeaccount){
            //2- renew from the e-pin
            auth()->user()->epin -= $main_data->price_activeaccount;

            //3- add 1 year plus the renew date
            $date = auth()->user()->activation_date;
            $carbon_date = Carbon::parse($date);
            $carbon_date->addYear(1);
            auth()->user()->activation_date = $carbon_date;
            auth()->user()->save();

            //4- register the epin transfer
            $this->renew_transfer(auth()->user()->id,$main_data->price_activeaccount);

            session()->flash('message','Account Renew Success');
            return redirect()->back();

        }
        else{
            session()->flash('error','Sorry Not Enough Balance');
            return redirect()->back();
        }

    }
    public function renew_transfer($id,$price){
        $wallet = new Epin();
        $wallet->id_sender = $id;
        $wallet->id_client = -1;
        $wallet->type = "post";
        $wallet->date = Carbon::now();
        $wallet->commission_type = "Renew_Account";
        $wallet->value = $price;
        $wallet->save();
        return;
    }

}

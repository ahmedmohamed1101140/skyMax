<?php

namespace App\Http\Controllers;

use App\Models\CashType;
use App\Models\Client;
use App\Models\Commision;
use App\Models\Country;
use App\Models\Epin;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WalletController extends Controller
{
    //
    public function index()
    {
        $id = auth()->user()->id;
        $countries = Country::all();
        $states = State::all();

        $stores = Epin::all()->where('id_sender','=',auth()->user()->id)->where('commission_type','=','Store_product');
        $directs = CashType::all()->where('customer_id','=',auth()->user()->id)->where('comtiontype','=','Direct_Commission');
        $binaries = CashType::all()->where('customer_id','=',auth()->user()->id)->where('comtiontype','=','Binary Income');

        $e_pins = Epin::all()->where('id_sender','=', $id);
        $e_moneys = CashType::all()->where('client_sender','=', $id);

        $e_pins1 = Epin::all()->where('id_client','=', $id);
        $e_moneys1 = CashType::all()->where('customer_id','=', $id);

        $count_store=0;
        $count_direct = 0;
        $count_binary = 0;
        foreach ($stores as $store){
            $count_store += $store->value;
        }
        foreach ($directs as $direct){
            $count_direct += $direct->cash_money;
        }

        foreach ($binaries as $binary){
            $count_binary += $binary->cash_money;
        }


        return view('site.wallet', compact('e_pins','e_pins1','e_moneys1','e_moneys', 'countries','states','count_direct','count_binary','count_store'));
    }

    public function filter(Request $request)
    {
        $id = auth()->user()->id;
        $countries = Country::all();
        $binary_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 1)->sum('value');
        $direct_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 2)->sum('value');
        $store_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 3)->sum('value');
        if ($request->wallet_type_id != 0) {
            $e_pins = Wallet::where('user_id', $id)
                ->where('wallet_type_id', $request->wallet_type_id)
                ->where('e_type_id', 1)->get();
            $e_moneys = Wallet::where('user_id', $id)
                ->where('wallet_type_id', $request->wallet_type_id)
                ->where('e_type_id', 2)->get();
        } else {

            $e_pins = Wallet::where('user_id', $id)
                ->where('e_type_id', 1)->get();
            $e_moneys = Wallet::where('user_id', $id)
                ->where('e_type_id', 2)->get();
        }
        return view('site.wallet', compact(
            'binary_commission',
            'direct_commission',
            'store_commission',
            'e_pins',
            'e_moneys',
            'countries'
        ));
    }


    public function transfer(Request $request)
    {
        $auth_user = auth()->user();
        $user = Client::all()->where('usercode','=', $request->username)->first();
        if($user == null){
            session()->flash('error',"user not found");
            return redirect()->back();
        }

        if($this->check_code_count($auth_user,$user)){
            $pincode = $request->pincode;
            if($user && ($pincode == $auth_user->pincode) && $user->id != $auth_user->id){
                if ($request->e_type_id == 0) {
                    if ($auth_user->emoney >= (int)$request->value) {
                        $transfer = new CashType();
                        $transfer->cash_money = $request->value;
                        $transfer->date = Carbon::now();
                        $transfer->bdate = Carbon::now();
                        $transfer->customer_id = $user->id;
                        $transfer->type = 'post';
                        $transfer->comtiontype = 'Transfer';
                        $transfer->client_sender = $auth_user->id;
                        $transfer->view = 1;
                        $transfer->save();
                        $auth_user->emoney -= (int)$request->value;
                        $auth_user->save();
                        $user->emoney += (int)$request->value;
                        $user->save();
                        session()->flash('message',"Transfer Success");
                        return redirect()->back();
                    }
                    else{
                        session()->flash('error',"not enough amount of money");
                        return redirect()->back();
                    }
                }
                else if ($request->e_type_id == 1) {
                    if ($auth_user->epin > (int)$request->value) {

                        $transfer = new Epin();
                        $transfer->value = $request->value;
                        $transfer->date = Carbon::now();
                        $transfer->id_client = $user->id;
                        $transfer->type = 'post';
                        $transfer->commission_type = 'Transfer';
                        $transfer->id_sender= $auth_user->id;
                        $transfer->save();

                        $auth_user->epin -= (int)$request->value;
                        $auth_user->save();

                        $user->epin += (int)$request->value;
                        $user->save();
                        session()->flash('message',"Transfer Success");
                        return redirect()->back();
                    }
                    else{
                        session()->flash('error',"not enough amount of money");
                        return redirect()->back();
                    }
                }
            }
            else{
                session()->flash('error',"wrong Pin-code");
                return redirect()->back();
            }
        }
        else{
            session()->flash('error',"Tree Child Only");
            return redirect()->back();
        }
    }

    public function check_code_count($auth_user,$user){
        $code1 = $auth_user->code_count;
        $code2 = $user->code_count;

//        $code1 = "1121";
//        $code2 = "1";
        if(strlen($code1) > strlen($code2)){
            if($code2 == substr($code1,0,strlen($code2))){
                return true;
//                dd("Parent Match");
            }
            else{
                return false;
//                dd('parent Dis match');
            }
        }
        elseif (strlen($code2) > strlen($code1)){
            if($code1 == substr($code2,0,strlen($code1))){
                return true;
//                dd("Child Match");
            }
            else{
                return false;
//                dd('Child Dis match');
            }
        }
        elseif (strlen($code1) == strlen($code2)){
            return false;
//            dd("can't send to user in same level");
        }
        return false;
    }


}

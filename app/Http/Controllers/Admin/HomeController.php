<?php

namespace App\Http\Controllers\Admin;

use App\Models\Basket;
use App\Models\CashType;
use App\Models\Client;
use App\Models\Epin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    public function index(){
        $clients = Client::count();

        $pin_credit = Epin::where('commission_type','=','AddFAdmin')->count();
        $pin_depit = Epin::where('commission_type','=','DeleteFAdmin')->count();
        $money_credit = CashType::where('comtiontype','=','TransferFAdmin')->count();
        $money_depit = CashType::where('comtiontype','=','DeleteFAdmin')->count();

        $shipping = Epin::where('commission_type','=','Product Charges')->sum('value');
        $registeration = Epin::where('commission_type','=','Register_New_Account')->sum('value');

        $order_qualified = Basket::where('type','=','0')->count();
        $order_store = Basket::where('type','=','1')->count();

        $direct = CashType::where('comtiontype','=','Direct_Commission')->sum('cash_money');
        $binary = CashType::where('comtiontype' ,'=','Binary Income')->sum('cash_money');

        $commission_clients = CashType::all()->where('comtiontype','=','CommissionSproduct')->unique('customer_id')->count();
        $store_commission = CashType::where('comtiontype','=','CommissionSproduct')->sum('cash_money');

        return view('admin.dashboard.index',compact(
            'clients',
            'pin_depit',
            'pin_credit',
            'money_depit',
            'money_credit',
            'shipping',
            'registeration',
            'order_qualified',
            'order_store',
            'direct',
            'binary',
            'commission_clients',
            'store_commission'
        ));
    }

    public function pin_credit(Request $request){
        $pin_credits = Epin::all()->where('commission_type','=','AddFAdmin');
        $money = Epin::where('commission_type','=','AddFAdmin')->sum('value');
        return view('admin.dashboard.pin_credit',compact('pin_credits','money'));
    }

    public function pin_debit(Request $request){
        $pin_debits = Epin::all()->where('commission_type','=','DeleteFAdmin');
        $money = Epin::where('commission_type','=','DeleteFAdmin')->sum('value');
        return view('admin.dashboard.pin_debit',compact('pin_debits','money'));
    }

    public function money_credit(Request $request){
        $money_credits = CashType::all()->where('comtiontype','=','TransferFAdmin');
        $money = CashType::where('comtiontype','=','TransferFAdmin')->sum('cash_money');
        return view('admin.dashboard.money_credit',compact('money_credits','money'));
    }

    public function money_debit(Request $request){
        $money_debits = CashType::all()->where('comtiontype','=','DeleteFAdmin');
        $money = CashType::where('comtiontype','=','DeleteFAdmin')->sum('cash_money');
        return view('admin.dashboard.money_debit',compact('money_debits','money'));
    }

    public function shipping(Request $request){
        $shippings = Epin::all()->where('commission_type','=','Product Charges');
        $shipping = Epin::where('commission_type','=','Product Charges')->sum('value');
        return view('admin.dashboard.shipping',compact('shippings','shipping'));
    }

    public function registeration(Request $request){
        $e_pins = Epin::where('commission_type','=','Register_New_Account')->get();
        $registeration = Epin::where('commission_type','=','Register_New_Account')->sum('value');
        return view('admin.dashboard.registeration',compact('e_pins','registeration'));
    }

    public function order_qualified(){
        $orders = Basket::all()->where('type','=','0');
        return view('admin.dashboard.qualified',compact('orders'));
    }

    public function order_store(){
        $orders = Basket::all()->where('type','=','1');
        return view('admin.dashboard.store',compact('orders'));
    }

    public function binary(){
        $binary = CashType::where('comtiontype' ,'=','Binary Income')->sum('cash_money');
        $binaries = CashType::all()->where('comtiontype' ,'=','Binary Income');
        return view('admin.dashboard.binary',compact('binary','binaries'));
    }

    public function direct(){
        $direct = CashType::where('comtiontype','=','Direct_Commission')->sum('cash_money');
        $directs = CashType::all()->where('comtiontype','=','Direct_Commission');
        return view('admin.dashboard.direct',compact('direct','directs'));
    }

    public function commission_clients(){
        $commission_clients = CashType::all()->where('comtiontype','=','CommissionSproduct')->unique('customer_id');
        return view('admin.dashboard.client',compact('commission_clients'));
    }

    public function store_commission(){
        $store_commission = CashType::where('comtiontype','=','CommissionSproduct')->sum('cash_money');
        $store_commissions = CashType::all()->where('comtiontype','=','CommissionSproduct');
        return view('admin.dashboard.store_commission',compact('store_commissions','store_commission'));
    }

    public function clients(){
        $count = Client::count();
        $clients = Client::paginate(50);
        return view('admin.dashboard.clients',compact('clients','count'));
    }


    public function filter(Request $request){
        if($request->get('binary') !== null){
            $binaries = CashType::all()->where('comtiontype' ,'=','Binary Income');
            $binaries_array = array();
            foreach ($binaries as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $binaries = CashType::all()->whereIn('id',$binaries_array);
                $binary = CashType::whereIn('id',$binaries_array)->sum('cash_money');
                return view('admin.dashboard.binary',compact('binary','binaries'));
            }
            else{
                $binary = CashType::where('comtiontype' ,'=','Binary Income')->sum('cash_money');
                $binaries = CashType::all()->where('comtiontype' ,'=','Binary Income');
                session()->flash('message','No Item Found');
                return view('admin.dashboard.binary',compact('binary','binaries'));
            }
        }

        else if($request->get('client_commissions') !== null){
            $commission_clients = CashType::all()->where('comtiontype','=','CommissionSproduct')->unique('customer_id');
            $binaries_array = array();
            foreach ($commission_clients as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $commission_clients = CashType::all()->whereIn('id',$binaries_array);
                return view('admin.dashboard.client',compact('commission_clients'));
            }
            else{
                $commission_clients = CashType::all()->where('comtiontype','=','CommissionSproduct')->unique('customer_id');
                session()->flash('message','No Item Found');
                return view('admin.dashboard.client',compact('commission_clients'));
            }
        }

        else if($request->get('clients') !== null){
            $items = Client::where('id', '!=', null);
            $clients = Client::all();

            $clients_array = array();
            if($request->from !== null && $request->to !== null){
                foreach ($clients as $client){
                    if(strtotime($request->from) <= strtotime($client->statics_date) && strtotime($request->to) >= strtotime($client->statics_date)){
                        array_push($clients_array,$client->id);
                    }
                }
            }
            if(count($clients_array) > 0){
                $items->whereIn('id',$clients_array);
                $count = $items->get()->count();
                $clients = $items->paginate(100);
                return view('admin.dashboard.clients',compact('clients','count'));
            }
            else{
                session()->flash('message','No User Found');
                $count = Client::count();
                $clients = Client::paginate(100);
                return view('admin.dashboard.clients',compact('clients','count'));
            }
        }

        else if($request->get('direct') !== null){
            $directs = CashType::all()->where('comtiontype','=','Direct_Commission');
            $binaries_array = array();
            foreach ($directs as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $directs = CashType::all()->whereIn('id',$binaries_array);
                $direct = CashType::whereIn('id',$binaries_array)->sum('cash_money');
                return view('admin.dashboard.direct',compact('direct','directs'));
            }
            else{
                $direct = CashType::where('comtiontype','=','Direct_Commission')->sum('cash_money');
                session()->flash('message','No Item Found');
                return view('admin.dashboard.direct',compact('direct','directs'));
            }
        }

        else if($request->get('money_credit') !== null){
            $money_debits = CashType::all()->where('comtiontype','=','TransferFAdmin');
            $binaries_array = array();
            foreach ($money_debits as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $money_credits = CashType::all()->whereIn('id',$binaries_array);
                $money = CashType::whereIn('id',$binaries_array)->sum('cash_money');
                return view('admin.dashboard.money_credit',compact('money_credits','money'));
            }
            else{
                $money_credits = CashType::all()->where('comtiontype','=','TransferFAdmin');
                $money = CashType::where('comtiontype','=','TransferFAdmin')->sum('cash_money');
//                session()->flash('message','No Item Found');
                return view('admin.dashboard.money_credit',compact('money_credits','money'));
            }
        }

        else if($request->get('money_debit') !== null){
            $money_debits = CashType::all()->where('comtiontype','=','DeleteFAdmin');
            $binaries_array = array();
            foreach ($money_debits as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $money_debits = CashType::all()->whereIn('id',$binaries_array);
                $money = CashType::whereIn('id',$binaries_array)->sum('cash_money');
                return view('admin.dashboard.money_debit',compact('money_debits','money'));
            }
            else{
                $money_debits = CashType::all()->where('comtiontype','=','DeleteFAdmin');
                $money = CashType::where('comtiontype','=','DeleteFAdmin')->sum('cash_money');
                session()->flash('message','No Item Found');
                return view('admin.dashboard.money_debit',compact('money_debits','money'));
            }
        }

        else if($request->get('pin_credit') !== null){
            $pin_debits = Epin::all()->where('commission_type','=','AddFAdmin');
            $binaries_array = array();
            foreach ($pin_debits as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $pin_credits = Epin::all()->whereIn('id',$binaries_array);
                $money = Epin::whereIn('id',$binaries_array)->sum('value');
                return view('admin.dashboard.pin_credit',compact('pin_credits','money'));
            }
            else{
                $pin_credits = Epin::all()->where('commission_type','=','AddFAdmin');
                $money = Epin::where('commission_type','=','AddFAdmin')->sum('value');
                session()->flash('message','No Item Found');
                return view('admin.dashboard.pin_credit',compact('pin_credits','money'));
            }
        }

        else if($request->get('pin_debit') !== null){
            $pin_debits = Epin::all()->where('commission_type','=','DeleteFAdmin');
            $binaries_array = array();
            foreach ($pin_debits as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $pin_debits = Epin::all()->whereIn('id',$binaries_array);
                $money = Epin::whereIn('id',$binaries_array)->sum('value');
                return view('admin.dashboard.pin_debit',compact('pin_debits','money'));
            }
            else{
                $pin_debits = Epin::all()->where('commission_type','=','DeleteFAdmin');
                $money = Epin::where('commission_type','=','DeleteFAdmin')->sum('value');
                session()->flash('message','No Item Found');
                return view('admin.dashboard.pin_debit',compact('pin_debits','money'));
            }
        }

        else if($request->get('qualified') !== null){
            $orders = Basket::all()->where('type','=','0');
            $binaries_array = array();
            foreach ($orders as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $orders = Basket::all()->whereIn('id',$binaries_array);
                return view('admin.dashboard.qualified',compact('orders'));
            }
            else{
                $orders = Basket::all()->where('type','=','0');
                return view('admin.dashboard.qualified',compact('orders'));
            }
        }

        else if($request->get('store') !== null){
            $orders = Basket::all()->where('type','=','1');
            $binaries_array = array();
            foreach ($orders as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $orders = Basket::all()->whereIn('id',$binaries_array);
                return view('admin.dashboard.store',compact('orders'));
            }
            else{
                $orders = Basket::all()->where('type','=','1');
                return view('admin.dashboard.store',compact('orders'));
            }
        }

        else if($request->get('registeration') !== null){
            $e_pins = Epin::where('commission_type','=','Register_New_Account')->get();
            $binaries_array = array();
            foreach ($e_pins as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $e_pins = CashType::all()->whereIn('id',$binaries_array);
                $registeration  = CashType::whereIn('id',$binaries_array)->sum('cash_money');
                return view('admin.dashboard.registeration',compact('e_pins','registeration'));
            }
            else{
                $e_pins = Epin::where('commission_type','=','Register_New_Account')->get();
                $registeration = Epin::where('commission_type','=','Register_New_Account')->sum('value');
                session()->flash('message','No Item Found');
                return view('admin.dashboard.registeration',compact('e_pins','registeration'));
            }
        }
        else if($request->get('shipping') !== null){
            $shippings = Epin::all()->where('commission_type','=','Product Charges');
            $binaries_array = array();
            foreach ($shippings as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $e_pins = Epin::all()->whereIn('id',$binaries_array);
                $shipping = Epin::whereIn('id',$binaries_array)->sum('cash_money');
                return view('admin.dashboard.shipping',compact('shippings','shipping'));
            }
            else{
                $shippings = Epin::all()->where('commission_type','=','Product Charges');
                $shipping = Epin::where('commission_type','=','Product Charges')->sum('value');
                session()->flash('message','No Item Found');
                return view('admin.dashboard.shipping',compact('shippings','shipping'));
            }
        }

        else if($request->get('store_commission') !== null){
            $store_commissions = CashType::all()->where('comtiontype','=','CommissionSproduct');
            $binaries_array = array();
            foreach ($store_commissions as $binary){
                if(strtotime($request->from) <= strtotime($binary->date) && strtotime($request->to) >= strtotime($binary->date)){
                    array_push($binaries_array,$binary->id);
                }
            }
            if(count($binaries_array) > 0){
                $store_commissions = CashType::all()->whereIn('id',$binaries_array);
                $store_commission = CashType::whereIn('id',$binaries_array)->sum('cash_money');
                return view('admin.dashboard.store_commission',compact('store_commissions','store_commission'));
            }
            else{
                session()->flash('message','No Item Found');
                $store_commission = CashType::where('comtiontype','=','CommissionSproduct')->sum('cash_money');
                $store_commissions = CashType::all()->where('comtiontype','=','CommissionSproduct');
                return view('admin.dashboard.store_commission',compact('store_commissions','store_commission'));
            }
        }
    }


}

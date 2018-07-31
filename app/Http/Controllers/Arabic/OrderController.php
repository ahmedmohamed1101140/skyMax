<?php

namespace App\Http\Controllers\Arabic;

use App\Models\Basket;
use App\Models\CashType;
use App\Models\Client;
use App\Models\Commision;
use App\Models\Epin;
use App\Models\NetworkSeting;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    //
    public function index(Request $request){
        dd('sds');
        //order scenario
        //two items user could buy I-store and qualified
        //user could buy only one qulaified item and the activate the user account
        //qualified items
        //value of the qualified item get from the user e-money wallet
        //shipping phease of the qualified items get from the user e-pin wallet
        //I-store items
        //don't have shipping phease and the user have to be activated
        //I-store value get from the user e-pin wallet
        //commission
        //only I-store products have it's commission
        //add the item commission to user e-money wallet
        //check if the product is qualified or i-store
        //buy from qualified
        //if qualified check if user is active or not
        //if user not active check the e-pin and the e-money
        //check the product amount
        //activate the user account
        //take values from e-pin and e-money wallets
        //save the user new data
        //add the order to the user with status pinding
        //down the amount of the product
        //register the transfer in the epin and emoney table to the admin
        //buy from i-store
        //check the user have to be activated
        //check the user I-store wallet for the product value
        //check the product amount
        //create the order
        //down the e-pin wallet amount
        //add commission to user e-money wallet
        //down the product amount

        //if video product start the scenario of order videos
        if(Product::find($request->product_id)->video_id == 1 || count(Product::find($request->product_id)->videos) > 0){
            $this->order_video($request);
        }

        //Validate request
        $this->validate($request ,array(
            'product_id'=>'required',
            'name'=>'required',
            'password'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'amount'=>'required',
        ));

        $user = auth()->user();
        if(!$user){
            return redirect()->back();
        }

        $product = Product::find($request->product_id);

        //1- validate the amount of the product
        if($request->password && $user){
            if($request->password != auth()->user()->pincode){
                session()->flash('error','خطأ فى الرقم السرى');
                return redirect()->back();
            }
        }

        //2- check the type of the product
        if(($user->activation == 0 && $product->type == 2) || ($user->activation == 1 && $product->type == 1)|| $product->amount < $request->amount){
            session()->flash('error','لا يمكنك شراء هذا المنتج');
            return redirect()->back();
        }

        //2- check the type of the product
        //Qualified Product
        if($product->type == 1){
            if($product->discount > 0){
                if($user->emoney < ($product->discount * $request->amount) && $user->epin < ($product->shipping_phease*$request->amount)){
                    session()->flash('error','لا يوجد لديك الحساب الكافى لشراء هذا المنتج');
                    return redirect()->back();
                }
            }
            //check if the user wallet have the amount to buy the product
            if (($user->emoney >= ($product->price*$request->amount) && $user->epin >= ($product->shipping_phease*$request->amount)) || ($user->emoney >= ($product->discount * $request->amount) && $user->epin >= ($product->shipping_phease*$request->amount))) {
                for($i=0;$i<$request->amount;$i++){
                    //5- user e-money wallet product price transfer
                    if($product->discount > 0){
                        $this->register_money_transfer($product->discount,$user);
                    }
                    else{
                        $this->register_money_transfer($product->price,$user);
                    }
                    //6- user e pin wallet product transfer phease
                    $this->register_pin_transfer($product,$user);
                }
                //7- send direct commission to the direct Parent
                $this->send_direct_commission($user);

                //8- register the direct commission transaction
                $this->direct_commission_transaction($user);

                //9- find all user parent -> plus all exit attributes -> register binary commission  if exist
                $this->find_user_parents($user);


                //1- create new order with status pindding
                $this->create_order($request,$user);

                //2- down the product amount from the store
                $product->amount -= $request->amount;
                $product->save();

                //3- down the credit from the user
                if($product->discount > 0){
                    $user->emoney -= $product->discount*$request->amount;
                }
                else{
                    $user->emoney -= $product->price*$request->amount;
                }
                $user->epin -= $product->shipping_phease*$request->amount;

                //4- activate user account
                $user->activation = 1;
                $user->save();


                //10-open two free videos
                    session()->flash('message','تم اضافه هذا المنتج لك بنجاح');
                return redirect()->back();

            }
            else{
                session()->flash('error','ليس لديك الحساب الكافى لشراء هذ المنتج');
                return redirect()->back();
            }
        }

        //I-store Product
        else if($product->type == 2)
        {
            if($product->discount > 0){
                if($user->epin < ($product->discount * $request->amount)){
                    session()->flash('error','ليس لديك الحساب الكافى لشراء هذا المنتج');
                    return redirect()->back();
                }
            }
            //check if the user wallet have the amount to buy the product
            if (($user->epin >= ($product->price*$request->amount))|| ($user->epin>= ($product->discount * $request->amount))) {

                //1- create new order with status pindding
                $this->create_order($request,$user);

                //2- down the product amount from the store
                $product->amount -= $request->amount;
                $product->save();

                //3- down the credit from the user
                if($product->discount>0){
                    $user->epin -= $product->discount * $request->amount;
                }
                else{
                    $user->epin -= $product->price * $request->amount;
                }

                //4- add commission
                $user->emoney += $product->commission * $request->amount;
                $user->save();

                for($i = 0 ; $i < $request->amount ; $i++){
                    //5- user e-money wallet product commission transfer
                    $this->register_commission_transfer($product,$user);

                    if($product->discount > 0){
                        $this->register_I_pin_transfer($product->discount,$user);
                    }
                    else{
                        $this->register_I_pin_transfer($product->price,$user);
                    }
                    //6- user e-pin wallet product transfer price
                }
                session()->flash('message','تم شراء المنتج');
                return redirect()->back();
            }
            else{
                session()->flash('message','ليس لديك الحساب الكافى لشراء هذا المنتج');
                return redirect()->back();
            }
        }

        else {
            session()->flash('error','حذثت مشكله حاول مره اخرى');
            return redirect()->back();

        }
    }

    public function order_video(Request $request){
        $this->validate($request,array(
            'password'=>'required',
        ));

        $user = auth()->user();

        if(!$user){
            return redirect()->back();
        }

        $product = Product::find($request->product_id);

        //1- validate the amount of the product
        if($request->password && $user){
            if($request->password != auth()->user()->pincode){
                session()->flash('error','خطأ فى كلمه المرور');
                return redirect()->back();
            }
        }

        //2- check the type of the product
        if(($user->activation == 0 && $product->type == 2) || ($user->activation == 1 && $product->type == 1)){
            session()->flash('error','لا يمكنك شراء هذا النتج');
            return redirect()->back();
        }

        //2- check the type of the product
        //Qualified Product
        if($product->type == 1){
            if($product->discount > 0){
                if($user->emoney <= $product->discount && $user->epin <= $product->shipping_phease){
                    session()->flash('error','ليس لديك الحساب الكافى لشراء هذا المنتج');
                    return redirect()->back();
                }
            }

            //check if the user wallet have the amount to buy the product
            if (($user->emoney >= $product->price && $user->epin >= $product->shipping_phease) || ($user->emoney >= $product->discount && $user->epin >= $product->shipping_phease)) {

                //1- create new order with status pindding
                $this->create_video_order($request,$user);

                //2- down the credit from the user
                if($product->discount > 0){
                    $user->emoney -= $product->discount;
                }
                else{
                    $user->emoney -= $product->price;
                }

                $user->epin -= $product->shipping_phease;

                //3- activate user account
                $user->activation = 1;
                $user->save();

                //4- user e-money wallet product price transfer
                if($product->discount > 0){
                    $this->register_money_transfer($product->discount,$user);
                }
                else{
                    $this->register_money_transfer($product->price,$user);
                }

                //5- user e pin wallet product transfer phease
                $this->register_pin_transfer($product,$user);

                //6- send direct commission to the direct Parent
                $this->send_direct_commission($user);

                //7- register the direct commission transaction
                $this->direct_commission_transaction($user);

                //8- find all user parent -> plus all exit attributes -> register binary commission  if exist
                $this->find_user_parents($user);
                session()->flash('message','تم شراء المنتج بنجاح');
                return redirect()->back();
            }
            else{
                session()->flash('error','ليس لديك الحساب الكافى لشراء هذا المنتج');
                return redirect()->back();
            }
        }

        //I-store Product
        else if($product->type == 2)
        {
            if($product->discount > 0){
                if($user->epin < $product->discount){
                    session()->flash('error','ليس لديك الحساب الكافى لشراء هذا المنتج');
                    return redirect()->back();
                }
            }
            if (($user->epin >= $product->price)|| ($user->epin >= $product->discount )) {

                //1- create new order with status pindding
                $this->create_video_order($request,$user);


                //2- down the credit from the user
                if($product->discount>0){
                    $user->epin -= $product->discount;
                }
                else{
                    $user->epin -= $product->price;
                }

                //3- add commission
                $user->emoney += $product->commission;
                $user->save();

                //4- user e-money wallet product commission transfer
                $this->register_commission_transfer($product,$user);

                //5- user e-pin wallet product transfer price
                if($product->discount > 0){
                    $this->register_I_pin_transfer($product->discount,$user);
                }
                else{
                    $this->register_I_pin_transfer($product->price,$user);
                }

                session()->flash('error','تم شراء المنتج بنجاح');
                return redirect()->back();
            }
            else{
                session()->flash('error','ليس لديك الحساب الكافى لشراء هذا المنتج');
                return redirect()->back();
            }
        }

        else {
            session()->flash('error','حدث خطأ ما حاول مره اخرى');
            return redirect()->back();
        }

    }

    public function create_order($request,$user){

        $order = new Basket();
        $order->prod_id = $request->product_id;
        $order->client_id = $user->id;
        if ($request->address_input)
            $order->address = $request->address_input;
        else
            $order->address = $user->address;
        $order->phone = $request->mobile;
        $order->name = $request->name;
        $order->mail = $request->email;
        $order->amount = $request->amount;
        $order->status = 0;
        $order->view = 0;
        $order->save();
    }

    public function create_video_order($request,$user){
        $order = new Basket();
        $order->prod_id = $request->product_id;
        $order->client_id = $user->id;

        $order->address = $user->address;
        $order->phone = $user->phone;
        $order->name = $user->fname.$user->sname.$user->lname;
        $order->mail = $user->mail;
        $order->amount = 0;
        $order->status = 0;
        $order->view = 0;
        $order->save();
    }

    public function register_money_transfer($price,$user){
        $wallet = new CashType();
        $wallet->client_sender = $user->id;
        $wallet->date = Carbon::now();
        $wallet->customer_id = -1;
        $wallet->type = "post";
        $wallet->comtiontype = 'Shop_product';
        $wallet->cash_money = $price;
        $wallet->save();
    }

    public function register_pin_transfer($product,$user){
        $wallet = new Epin();
        $wallet->id_sender = $user->id;
        $wallet->id_client = -1;
        $wallet->type = "post";
        $wallet->date = Carbon::now();
        $wallet->commission_type = "Product Charges";
        $wallet->value = $product->shipping_phease;
        $wallet->save();
    }

    public function register_I_pin_transfer($price,$user){
        $wallet = new Epin();
        $wallet->id_sender = $user->id;
        $wallet->id_client = -1;
        $wallet->type = "post";
        $wallet->date = Carbon::now();
        $wallet->commission_type = "Shop_product";
        $wallet->value = $price;
        $wallet->save();
    }

    public function register_commission_transfer($product,$user){
        $wallet = new CashType();
        $wallet->client_sender = -1;
        $wallet->date = Carbon::now();
        $wallet->customer_id = $user->id;
        $wallet->type = "get";
        $wallet->comtiontype = 'CommissionSproduct';
        $wallet->cash_money = $product->commission;
        $wallet->save();
    }

    public function send_direct_commission($user){
        $client = Client::all()->where('id','=',$user->id_add)->first();
        $main_data = NetworkSeting::all()->first();
        if($client){
            $client->emoney += $main_data->direct_commission;
            $client->save();
        }
        else{
            session()->flash('error','cant find parent to send commission');
            return redirect()->back();
        }
    }

    public function direct_commission_transaction($user){
        $client = Client::all()->where('id','=',$user->id_add)->first();
        $main_data = NetworkSeting::all()->first();
        if($client){
            $wallet = new CashType();
            $wallet->client_sender = $user->id;
            $wallet->customer_id = $client->id;
            $wallet->date = Carbon::now();
            $wallet->type = "post";
            $wallet->comtiontype = 'Direct_Commission';
            $wallet->cash_money = $main_data->direct_commission ;
            $wallet->save();
        }
        else{
            session()->flash('error','cant register e-money commission transfer');
            return redirect()->back();
        }
    }

    public function find_user_parents($user){
        $position = substr($user->code_count,strlen($user->code_count)-1,1);
        for ($i=1 ; $i<strlen($user->code_count) ; $i++){
            $client = Client::all()->where('code_count','=',substr($user->code_count,0,(strlen($user->code_count)-$i)))->first();
            if($client){
                if($position == '1'){
                    $client->exitcom_right++;
                }
                elseif ($position == '2'){
                    $client->exitcom_left++;
                }
                $client->save();
                if($client->exitcom_left >= 3 && $client->exitcom_right >= 3){
                    //add the commission to commission table
                    $this->binary_commission($user,$client);
                }
                elseif ($client->exitcom_left >= 6 && $client->exitcom_right >= 6){
                    //add the commission to commission table
                    $this->binary_commission($user,$client);
                }
                $position = substr($client->code_count,strlen($client->code_count)-1,1);
            }
            else{
                session()->flash('error','something went wrong');
                return redirect()->back();
            }
        }
    }

    public function binary_commission($user,$client){
        $commission = new Commision();
        $commission->date = Carbon::now();
        $commission->client_code_to = $client->code_count;
        $commission->client_code_from = $user->code_count;
        $commission->save();
    }

}

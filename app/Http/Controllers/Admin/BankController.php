<?php

namespace App\Http\Controllers\Admin;

use App\Models\BankAccount;
use App\Models\CashType;
use App\Models\Client;
use App\Models\Epin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankController extends Controller
{
    public function index()
    {

        $e_moneys = CashType::paginate(20);
        return view('admin.banks.index', compact('e_moneys'));
    }

    public function create()
    {

        return view('admin.banks.create',compact('clients'));
    }

    public function store(Request $request)
    {
        $success = 0;
        $failed = 0;
        if($request->pin == 0 && $request->money == 0 ){
            session()->flash('message','Missing inputs Please Fill All Inputs And Try Again');
            return redirect()->back();
        }

        if($request->pin == null || $request->money == null || $request->clients == null){
            session()->flash('message','Transaction Made '.$success.' Transactions Success ,'.$failed.'Transactions Failed');
            return redirect()->back();
        }
        else{
            foreach ($request->clients as $client){
                $foundclient = Client::all()->where('usercode','=',$client)->first();
                if($foundclient){
                    $success++;
                    if($request->pin != null){
                        if($request->epin == 1){
                            $foundclient->epin += $request->pin;
                            $foundclient->save();

                            //store transfer into epin table
                            $transfer = new Epin();
                            $transfer->value = $request->pin;
                            $transfer->date = Carbon::now();
                            $transfer->id_client = $foundclient->id;
                            $transfer->type = 'get';
                            $transfer->commission_type = 'AddFAdmin';
                            $transfer->id_sender= "-1";
                            $transfer->save();
                        }
                        else if ($request->epin == 2){
                            $foundclient->epin -= $request->pin;
                            $foundclient->save();

                            //store transfer into epin table
                            $transfer = new Epin();
                            $transfer->value = -$request->pin;
                            $transfer->date = Carbon::now();
                            $transfer->id_client = $foundclient->id;
                            $transfer->type = 'post';
                            $transfer->commission_type = 'DeleteFAdmin';
                            $transfer->id_sender= "-1";
                            $transfer->save();

                        }
                    }
                    if($request->money != null){
                        if($request->emoney == 1){
                            $foundclient->emoney += $request->money;
                            $foundclient->save();

                            $transfer = new CashType();
                            $transfer->cash_money = $request->money;
                            $transfer->date = Carbon::now();
                            $transfer->bdate = Carbon::now();
                            $transfer->customer_id = $foundclient->id;
                            $transfer->type = 'get';
                            $transfer->comtiontype = 'TransferFAdmin';
                            $transfer->client_sender = "-1";
                            $transfer->view = 1;
                            $transfer->save();

                        }
                        else if ($request->emoney == 2){
                            $foundclient->emoney -= $request->money;
                            $foundclient->save();

                            $transfer = new CashType();
                            $transfer->cash_money = $request->money;
                            $transfer->date = Carbon::now();
                            $transfer->bdate = Carbon::now();
                            $transfer->customer_id = $foundclient->id;
                            $transfer->type = 'post';
                            $transfer->comtiontype = 'DeleteFAdmin';
                            $transfer->client_sender = "-1";
                            $transfer->view = 1;
                            $transfer->save();
                        }
                    }
                }
                else{
                    $failed++;
                }
            }
        }
        session()->flash('message','Transaction Made '.$success.' Transactions Success '.$failed.' Transactions Failed');
        return redirect()->back();
    }


    public function show($id)
    {
        return redirect('/admin/banks');
    }

    public function edit($id)
    {
        $item = Wallet::find($id);
        return view('admin.banks.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Wallet::find($id);
        $item->update($request->all());
        return redirect('/admin/banks');
    }


    public function destroy($id)
    {
        CashType::destroy($id);
        session()->flash('message','Transfer Deleted successfully');
        return redirect()->back();
    }

    public function filter(Request $request){
//        dd($request->all());
        $items = CashType::where('id', '!=', 0);

        if($request->sender !== null){
            $client = Client::where('username','=',$request->sender)->first();
            $items->Where('client_sender','=',$client->id);

        }

        if($request->receiver !== null){
            $client = Client::where('username','=',$request->receiver)->first();
            $items->Where('customer_id','=',$client->id);
        }

        if($request->view !== null){
            $items->Where('view','=',$request->view);
        }

        if($request->status !== null){
            if($request->status == 0){
                $items->Where('type','=','get');
            }
            elseif ($request->status == 1){
                $items->Where('type','=','post');
            }
        }

        if($request->type !== null){
            if($request->type == 1){
                $items->Where('comtiontype','=','TransferFAdmin');
            }
            elseif($request->type == 2){
                $items->Where('comtiontype','=','Transfer');
            }
            elseif($request->type == 3){
                $items->Where('comtiontype','=','Direct_Commission');
            }
            elseif($request->type == 4){
                $items->Where('comtiontype','=','Shop_Product');
            }
            elseif($request->type == 5){
                $items->Where('comtiontype','=','Binary Income');
            }
            elseif($request->type == 6){
                $items->Where('comtiontype','=','Cash Back');
            }
            elseif($request->type == 7){
                $items->Where('comtiontype','=','CommissionSproduct');
            }
        }

        if($request->amount_from && $request->amount_to){
            $items->whereBetween('cash_money',[$request->amount_from,$request->amount_to]);
        }
//        dd($items->get());
        $e_moneys = $items->paginate(20);
        return view('admin.banks.index', compact('e_moneys'));

    }


}

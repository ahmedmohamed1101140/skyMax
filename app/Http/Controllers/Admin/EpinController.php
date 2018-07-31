<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Epin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $e_pins = Epin::paginate(20);
        return view('admin.pins.index', compact('e_pins'));
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
        Epin::destroy($id);
        session()->flash('message','Transfer Deleted successfully');
        return redirect()->back();
    }

    public function Filter(Request $request){
//        dd($request->all());
        $items = Epin::where('id', '!=', 0);

        if($request->sender !== null){
            $client = Client::where('username','=',$request->sender)->first();
            $items->Where('id_sender','=',$client->id);
        }

        if($request->receiver !== null){
            $client = Client::where('username','=',$request->receiver)->first();
            $items->Where('id_client','=',$client->id);
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
                $items->Where('commission_type','=','AddFAdmin');
            }
            elseif($request->type == 2){
                $items->Where('commission_type','=','Transfer');
            }
            elseif($request->type == 3){
                $items->Where('commission_type','=','Register_new_account');
            }
            elseif($request->type == 4){
                $items->Where('commission_type','=','Product Charges');
            }
            elseif($request->type == 5){
                $items->Where('commission_type','=','Shop_product');
            }
            elseif($request->type == 6){
                $items->Where('commission_type','=','Store_product');
            }
        }

        if($request->amount_from && $request->amount_to){
            $items->whereBetween('value',[$request->amount_from,$request->amount_to]);
        }

        $e_pins = $items->paginate(20);
        return view('admin.pins.index', compact('e_pins'));
    }
}

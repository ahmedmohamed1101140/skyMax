<?php

namespace App\Http\Controllers\Admin;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $baskets = Basket::paginate(10);
        return view('admin.baskets.index')->with('orders',$baskets);
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
        $order = Basket::find($id);
        $product = Product::find($order->prod_id);
        return view('admin.baskets.show',compact('order','product'));
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
        $order = Basket::find($id);
        if($request->status !== null){
            $order->status = $request->status;
        }
        if($request->status == '2' && $request->awd !== null){
            $order->status = $request->status;
            $order->awd = $request->awd;
        }
        else{
            $order->status = $request->status;
        }
        $order->save();
        session()->flash('message','Order Updated successfully');
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
        Basket::destroy($id);
        session()->flash('message','Order Deleted successfully');
        return redirect()->back();

    }


    public function filter(Request $request){
        $items = Basket::where('id', '!=', 0);

        if($request->name !== null){
            $items->Where('name', 'LIKE', '%' . $request->name . '%');

        }
        if($request->view !== null){
            $items->Where('view','=',$request->view);
        }

        if($request->phone !== null){
            $items->Where('phone','LIKE', '%'.$request->phone.'%');
        }

        if($request->mail !== null){
            $items->Where('mail','LIKE', '%' . $request->mail . '%');
        }

        if($request->address !== null){
            $items->Where('address','LIKE', '%' . $request->address. '%');
        }

        if($request->awd !== null){
            $items->Where('awd','=',  $request->awd);
        }


        if($request->amount_from && $request->amount_to){
            $items->whereBetween('amount',[$request->amount_from,$request->amount_to]);
        }
//        dd($items->get());
        $orders = $items->paginate(10);

        return view('admin.baskets.index',compact('orders'));

    }

}

<?php

namespace App\Http\Controllers\Arabic;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $countries = Country::all();
        $states = State::all();
        $products_arr = array();
        foreach (auth()->user()->orders as $order){
            $product = Product::find($order->prod_id);
            if($product->video_id == 1){
                array_push($products_arr,$product);
            }
        }

        return view('site_ar.learning',compact('countries','categories','states'))->with('products',$products_arr);
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
        $countries = Country::all();
        $categories = Category::all();
        $states = State::all();
        $product = Product::find($id);
        return view('site_ar.learning_details',compact('countries','categories','states','product'));
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
    }
}

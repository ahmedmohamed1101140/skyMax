<?php

namespace App\Http\Controllers\Admin;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,array(
           'product_id' => 'required',
            'image_url' => 'required'
        ));
        $gallery = new Gallery();
        $gallery->prod_id = $request->product_id;

        $dir = public_path().'/images/product/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $gallery->image = $fileName ;

        $gallery->save();

        $product = Product::find($request->product_id);
        $orders = Basket::all()->where('prod_id','=', $request->product_id);
        $categories = Category::all()->where('view','=','1');
        session()->flash('message','Product Image Added Successfully');

        return view('admin.products.show',compact('product','categories','orders'));
        return redirect()->back();

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
        dd($id);
        Gallery::destroy($id);
        session()->flash('message','Product Image Deleted Successfully');
        return redirect()->back();
    }
}

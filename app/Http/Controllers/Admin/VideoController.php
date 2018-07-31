<?php

namespace App\Http\Controllers\Admin;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Tot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all()->where('video_id','=','1');
        $categories = Category::all();


        return view('admin.videos.index',compact('categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all()->where('view','=','1');
        $sub_categories = SubCategory::all()->where('view','=','1');
        return view('admin.videos.create',compact('categories','sub_categories'));
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
        $this->validate($request ,array(
            'name'=>'required',
            'description'=>'required',
            'name_ar'=>'required',
            'description_ar'=>'required',
            'category'=>'required',
            'sub_category'=>'required',
            'amount'=>'required',
            'limit'=>'required',

            'price'=>'required',
            'discount'=>'required',
            'type'=>'required',
            'view'=>'required',
            'commission'=>'required',
            'shipping_phease'=>'required',
            'cash_back'=>'required',
            'image_url'=>'required',
        ));

        $product = new Product();
        $product->name = $request->name;
        $product->details = $request->description;
        $product->name_ar = $request->name_ar;
        $product->details_ar = $request->description_ar;
        $product->cat_id = $request->category;
        $product->sub_id = $request->sub_category;
        $product->amount = $request->amount;
        $product->prod_limit = $request->limit;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->type = $request->type;
        $product->view = $request->view;
        $product->video_id = '1';
        $product->commission = $request->commission;
        $product->shipping_phease = $request->shipping_phease;
        $product->cash_back = $request->cash_back;

        //upload image to server directory to service
        $dir = public_path().'/images/product/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $product->image = $fileName ;


        $product->save();
        session()->flash('message','E-Learning Added successfully Please Add Videos');
        $categories = Category::all()->where('view','=','1');
        return view('admin.videos.show',compact('product','categories'));
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
        $product = Product::find($id);
        $orders = Basket::all()->where('prod_id','=',$id);
        $categories = Category::all()->where('view','=','1');
        return view('admin.videos.show',compact('product','categories','orders'));
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
        $this->validate($request,array(
            'product_id' => 'required',
            'title' => 'required',
            'title_ar' => 'required',
            'description' => 'required',
            'view' => 'required',
            'image_url' => 'required'
        ));

        $product = Product::find($request->product_id);
        $video = new Tot();
        $video->title = $request->title;
        $video->title_ar = $request->title_ar;
        $video->description = $request->description;
        $video->view = $request->view;
        $video->arrange = $product->videos->count()+1;

        $dir = public_path().'/images/videos/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $video->name = $fileName ;
        $video->prod_id = $request->product_id;

        $video->save();
        session()->flash('message','Video Added Successfully');
        return redirect()->route('videos.show',$product->id);

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
        Tot::destroy($id);
        session()->flash('message','Video Deleted Successfully');
        return redirect()->back();
    }

    public function filter(Request $request){
        $items = Product::where('id', '!=', 0)->where('video_id','=','1');

        if($request->name !== null){
            $items->Where('name', 'LIKE', '%' . $request->name . '%');

        }
        if($request->view !== null){
            $items->Where('view','=',$request->view);
        }

        if($request->category !== null){
            $items->Where('cat_id','=',$request->category);
        }

        if($request->price_from && $request->price_to){
            $items->whereBetween('price',[$request->price_from,$request->price_to]);
        }

        if($request->discount_from && $request->discount_to){
            $items->whereBetween('discount',[$request->discount_from,$request->discount_to]);
        }

        if($request->amount_from && $request->amount_to){
            $items->whereBetween('amount',[$request->amount_from,$request->amount_to]);
        }

        if($request->limits_from && $request->limits_to){
            $items->whereBetween('prod_limit',[$request->limits_from,$request->limits_to]);
        }

        if($request->commission_from && $request->commission_to){
            $items->whereBetween('commission',[$request->commission_from,$request->commission_to]);
        }

        if($request->shipping_from && $request->shipping_to){
            $items->whereBetween('shipping_phease',[$request->shipping_from,$request->shipping_to]);
        }

        $products = $items->paginate(10);
        $categories = Category::all();
        return view('admin.videos.index',compact('categories','products'));



    }
}

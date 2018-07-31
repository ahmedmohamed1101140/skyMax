<?php

namespace App\Http\Controllers\Admin;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Tot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('admin.products.index',compact('categories','products'));
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
        return view('admin.products.create',compact('categories','sub_categories'));
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
            'name_ar'=>'required',

            'description'=>'required',
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
        $product->name_ar = $request->name_ar;

        $product->details = $request->description;
        $product->details_ar = $request->description;

        $product->cat_id = $request->category;
        $product->sub_id = $request->sub_category;
        $product->amount = $request->amount;
        $product->prod_limit = $request->limit;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->type = $request->type;
        $product->view = $request->view;
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

        $orders = Basket::all()->where('prod_id','=',$product->id);
        $categories = Category::all()->where('view','=','1');
        session()->flash('message','Product Added successfully');

        return view('admin.products.show',compact('product','categories','orders'));


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
        return view('admin.products.show',compact('product','categories','orders'));
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

        $this->validate($request ,array(
            'name'=>'required',
            'description'=>'required',

            'amount'=>'required',
            'limit'=>'required',

            'price'=>'required',
            //'discount'=>'required',

            //'commission'=>'required',
            'shipping_phease'=>'required',
            //'cash_back'=>'required',

        ));


        $product = Product::find($id);
        $product->name = $request->name;
        $product->name_ar = $request->name_ar;
        $product->details = $request->description;
        $product->details_ar = $request->description_ar;

        if($request->category !== null){
            $product->cat_id = $request->category;
        }
        $product->amount = $request->amount;
        $product->prod_limit     = $request->limit;
        $product->price = $request->price;
        $product->discount = $request->discount;
        if($request->type !== null){
            $product->type = $request->type;
        }

        if($request->view !== null){
            $product->view = $request->view;
        }

        $product->commission = $request->commission;
        $product->shipping_phease = $request->shipping_phease;
        $product->cash_back = $request->cash_back;

        if($request->image_url !== null){
            //upload image to server directory to service
            $dir = public_path().'/images/product/';
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $product->image = $fileName ;
        }

        $product->save();
        session()->flash('message','Product Updated successfully');
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
        dd($id);
        $product = Product::find($id);
        if($product->videos->count() > 0){
            foreach ($product->videos as $video){
                Tot::destroy($video->id);
            }
        }
        elseif ($product->images->count() > 0){
            foreach ($product->images as $image) {
                Gallery::destroy($image->id);
            }
        }
        Product::destroy($id);
        session()->flash('message','Product deleted successfully');
        return redirect()->back();
        //
    }

    public function count(){
        return view('admin.products.limits');
    }

    public function filter(Request $request){
//        dd($request->all());
        $items = Product::where('id', '!=', 0);

        if($request->name !== null){
            $items->Where('name', 'LIKE', '%' . $request->name . '%');

        }
        if($request->view !== null){
            $items->Where('view','=',$request->view);
        }

        if($request->type !== null){
            $items->Where('type','=',$request->type);
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
        return view('admin.products.index',compact('categories','products'));
    }

    public function filter_limits(Request $request){
//        dd($request->all());
        $items = Product::where('id', '!=', 0);

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
        return view('admin.products.limits',compact('categories','products'));



    }




}

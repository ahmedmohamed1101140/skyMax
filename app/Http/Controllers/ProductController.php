<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\State;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\VarDumper\Dumper\esc;

class ProductController extends Controller
{
    //
    public function show($id)
    {

        $countries = Country::all();
        $states = State::all();
        $sub_categories = SubCategory::all()->where('view' ,'=','1');
        $images = Gallery::where('prod_id', $id)->get();
        $categories = Category::all()->where('view' ,'=','1');
        $product = Product::find($id);
        if($product->video_id == 1){
            if(auth()->user()){
                foreach (auth()->user()->orders as $order) {
                    if($order->prod_id == $product->id){
                        return view('site.learning_details',compact('countries','categories','states','product'));
                    }
                }
            }
            return view('site.product_video',compact('countries','categories','states','product'));
        }
        else{
            return view('site.product', compact('countries', 'states','product','images', 'categories', 'sub_categories'));
        }


    }

//    public function filter(Request $request)
//    {
//        $countries = Country::all();
//        $states = State::all();
//        $categories = Category::all()->where('view' ,'=','1');
//        $sub_categories = SubCategory::all()->where('view' ,'=','1');
//        $products = Product::where('view', '=', '1');
//
//        if ($request->from and $request->to) {
//            $products = $products->whereBetween('price', [$request->from, $request->to]);
//            session()->put('from', $request->from);
//            session()->put('to', $request->to);
//        }
//
//        $products = $products->get();
//        return view('site.index', compact('countries','states', 'products', 'categories', 'sub_categories'));
//
//    }

    public function products(Request $request)
    {

//        dd($request->all());
        $countries = Country::all();
        $categories = Category::where('view' ,'=','1');
        $sub_categories = SubCategory::where('view' ,'=','1');
        $states = State::all();


        $products = Product::where('view', '>=', 0);

        if ($request->category_id) {
            $categories = $categories->whereIn('id', $request->category_id)
                ->pluck('id')->toArray();
            $products = $products = Product::whereIn('cat_id', $categories);
        }
        elseif ($request->sub_category_id) {
            $sub_categories = $sub_categories->whereIn('id', $request->sub_category_id)
                ->pluck('id')->toArray();
            $products = $products->whereIn('sub_id', $request->sub_category_id);
        }

        if ($request->product_type_id) {
            if ($request->product_type_id != 3){
                $products = $products->where('type','=', (int)$request->product_type_id);
            }
        }

        session()->put('product_type_id', $request->get('product_type_id'));
        session()->put('category_id', $request->get('category_id'));
        session()->put('sub_category_id', $request->get('sub_category_id'));

        $products = $products->get();
        $cat_ids = $this->find_categories($products);
        $categories = Category::all()->where('view','=' ,'1')->whereIn('id',$cat_ids);
        $sub_categories = SubCategory::all()->where('view','=','1')->whereIn('cat_id',$cat_ids);
        return view('site.index', compact('countries', 'products', 'categories', 'sub_categories' , 'states'));
    }

    public function types(Request $request)
    {
        $countries = Country::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $products = Product::all()->where('view', '=', 2);
        if ($request->product_type_id) {
            $products = $products->where('product_type_id', $request->product_type_id);
            $products = $products->get();
        }
        if ($request->product_type_id == 3) {
            $products = Product::all();
        }
        session()->put('product_type_id', $request->get('product_type_id'));
        return view('site.index', compact('countries', 'products', 'categories', 'sub_categories'));
    }

    public function search(Request $request)
    {

        $countries = Country::all();
        $states = State::all();

        $items = Product::where('view', '!=', 0);

        if ($request->key) {
            $items->Where('name', 'LIKE', '%' . $request->key . '%');
            session()->put('key', $request->key);
        }

        if($request->from !== null  && $request->to !== null){
            $items->whereBetween('price',[$request->from,$request->to]);
            session()->put('from', $request->from);
            session()->put('to', $request->to);
        }

        $products = $items->get();

        $cat_ids = $this->find_categories($products);
        $categories = Category::all()->whereIn('id',$cat_ids);
        $sub_categories = SubCategory::all()->whereIn('cat_id',$cat_ids);
        return view('site.index', compact('countries','states', 'products', 'categories', 'sub_categories'));

//        $query = Product::query();
//        $columns = [
//            'name',
//            'details',
//            'name_ar',
//            'details_ar',
//        ];
//
//        if ($request->key) {
//            foreach ($columns as $column) {
//                $query->orWhere($column, 'LIKE', '%' . $request->key . '%');
//            }
//            session()->put('key', $request->key);
//        }
//
//
//        if ($request->from and $request->to) {
//            $query = $query->whereBetween('price', [(int)$request->from, (int)$request->to]);
//            session()->put('from', $request->from);
//            session()->put('to', $request->to);
//        }
//
//        dd($query->get());
//        $products = $query->get();
//        $products = $products->where('view','=',1);
//        return view('site.index', compact('countries','states', 'products', 'categories', 'sub_categories'));
    }

    public function my_products(Request $request){
        $orders = Basket::all()->where('client_id','=',auth()->user()->id);
        $countries = Country::all();
        $countries = Country::all();
        $states = State::all();
        return view('site.myorders', compact('orders','countries','states'));
    }


    public function find_categories($items){
        $cat_ids = array();
        foreach ($items as $item){
            if(!array_key_exists($item->cat_id,$cat_ids)){
                array_push($cat_ids,$item->cat_id);
            }
        }
        return $cat_ids;
    }
}

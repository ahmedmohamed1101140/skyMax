<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        return view('admin/categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
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
            'namear' => 'required',
            'view'=>'required',
            'image_url'=>'required',
        ));

        $category = new Category();
        $category->name = $request->name;
        $category->namear = $request->namear;
        $category->view= $request->view;

        //upload image to server directory to service
        $dir = public_path().'/images/category/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $category->image = $fileName ;

        $category->save();
        session()->flash('message','Category Added successfully');
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
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
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
        dd($request->all());
        $this->validate($request,array(
           'name'=> 'required',
            'namear' => 'required'
        ));

        $category = Category::find($id);
        $category->name = $request->name;
        $category->namear = $request->namear;

        if($request->view !== null){
            $category->view = $request->view;
        }
        if($request->image_url){
            //upload image to server directory to service
            $dir = public_path().'/images/category/';
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            $category->image = $fileName ;
        }
        $category->save();

        session()->flash('message','Category Updated successfully');
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
        Category::destroy($id);
        session()->flash('message','Category deleted successfully');
        return redirect()->back();
    }
}

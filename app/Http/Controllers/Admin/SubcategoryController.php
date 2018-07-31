<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcateogries = SubCategory::all();
        return view('admin.subcategories.index',compact('subcateogries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name' => 'required',
            'name_ar' => 'required',
            'view' => 'required',
            'category' => 'required',
        ));

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->namear = $request->name_ar;
        $subcategory->view = $request->view;
        $subcategory->cat_id = $request->category;

        $subcategory->save();

        session()->flash('message','Sub-Category Added successfully');
        return redirect()->back();
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
        $subcategory = SubCategory::find($id);
        $categories = Category::all()->where('view' , '=' , '1');
        return view('admin.subcategories.edit',compact('subcategory','categories'));
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
            'name' => 'required',
            'name_ar' => 'required',
        ));

        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->namear = $request->name_ar;

        if($request->view !== null){
            $subcategory->view = $request->view;
        }
        if($request->category !== null){
            $subcategory->cat_id = $request->category;
        }
        $subcategory->save();

        session()->flash('message','Sub-Category Updated successfully');
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
        SubCategory::destroy($id);
        session()->flash('message','Sub-Category deleted successfully');
        return redirect()->back();
    }
}

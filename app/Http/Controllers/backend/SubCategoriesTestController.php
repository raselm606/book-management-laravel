<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryTest;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoriesTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriess  = CategoryTest::orderBy('category_en','asc')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.pages.sub-category.index',compact('categoriess','subcategories'));
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
        $request->validate([
            'category_id' => 'required',
            'subcategory_en' => 'required|unique:sub_categories,subcategory_en',
            'subcategory_bn' => 'nullable|unique:sub_categories,subcategory_bn',
            'subcategory_slug' => 'nullable|unique:sub_categories,subcategory_slug',
        ],[
            'category_en.required' => 'Name taken or try again',
        ]);

        $categories = new SubCategory();
        $categories->category_id = $request->category_id;
        $categories->subcategory_en = $request->subcategory_en;
        $categories->subcategory_bn = $request->subcategory_bn;
        if(empty($request->subcategory_slug)){
            $categories->subcategory_slug = str::slug($request->subcategory_en);
        }else{
            $categories->subcategory_slug = str::slug($request->subcategory_slug);
        }
        $categories->save();

        $notification = array(
            'msg' =>'SubCategory Added Successfully',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
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
        $subcategories = SubCategory::where('id', $id)->first();
        $subcategories->category_id = $request->category_id;
        $subcategories->subcategory_en = $request->subcategory_en;
        $subcategories->subcategory_bn = $request->subcategory_bn;
        if(empty($request->subcategory_slug)){
            $subcategories->subcategory_slug = str::slug($request->subcategory_slug);
        }else{
            $subcategories->subcategory_slug = str::slug($request->subcategory_slug);
        }
        $subcategories->update();

        $notification = array(
            'msg' =>'SubCategory updated Successfully',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::where('id', $id)->first();
        $subcategory->delete();
        $notification = array(
            'msg' =>'SubCategory Deleted Successfully',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
    }
}

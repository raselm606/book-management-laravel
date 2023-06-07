<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryTest;
use App\Models\SubCategory;
use App\Models\SubSubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryTest::orderBy('category_en','asc')->get();
        $subcategories = SubCategory::orderBy('subcategory_en','asc')->get();
        $subsubcategories = SubSubCategories::latest()->get();
        return view('backend.pages.sub-sub-category.index',compact('categories','subcategories','subsubcategories'));
    }

   public function getSubCategory($category_id){
    $subCat = SubCategory::where('category_id',$category_id)->orderby('subcategory_en','asc')->get();
    return json_encode($subCat);
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
            'subcategory_id' => 'required',
            'subcategory_en' => 'required|unique:sub_sub_categories,subcategory_en',
            'subcategory_bn' => 'nullable|unique:sub_sub_categories,subcategory_bn',
            'subcategory_slug' => 'nullable|unique:sub_sub_categories,subcategory_slug',
        ],[
            'subcategory_en.required' => 'Name taken or try again',
        ]);

        $categories = new SubSubCategories();
        $categories->category_id = $request->category_id;
        $categories->subcategory_id = $request->subcategory_id;
        $categories->subcategory_en = $request->subcategory_en;
        $categories->subcategory_bn = $request->subcategory_bn;
        if(empty($request->subcategory_slug)){
            $categories->subcategory_slug = str::slug($request->subcategory_en);
        }else{
            $categories->subcategory_slug = str::slug($request->subcategory_slug);
        }
        $categories->save();

        $notification = array(
            'msg' =>'Sub SubCategory Added Successfully',
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
//        $categories = CategoryTest::orderBy('category_en','asc')->get();
//        $subcategories = SubCategory::orderBy('subcategory_en','asc')->get();
//        $subsubcategories = SubSubCategories::findOrFail($id);

        $categoriess = SubSubCategories::findOrFail($id);
        $categoriess->category_id = $request->category_id;
        $categoriess->subcategory_id = $request->subcategory_id;
        $categoriess->subcategory_en = $request->subcategory_en;
        $categoriess->subcategory_bn = $request->subcategory_bn;
        if(empty($request->subcategory_slug)){
            $categoriess->subcategory_slug = str::slug($request->subcategory_en);
        }else{
            $categoriess->subcategory_slug = str::slug($request->subcategory_slug);
        }
        $categoriess->update();

        $notification = array(
            'msg' =>'Sub SubCategory Updated Successfully',
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
        //
    }
}

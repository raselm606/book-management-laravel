<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryTest;
use App\Models\SubCategory;
use App\Models\SubSubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoriesTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryTest::orderBy('id', 'desc')->get();
        return view('backend.pages.categories-test.index',compact('categories'));
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
            'category_en' => 'required|unique:category_test,category_en',
            'category_bn' => 'nullable|unique:category_test,category_bn',
            'category_slug' => 'nullable|unique:category_test,category_slug',
        ],[
            'category_en.required' => 'Name taken or try again',
        ]);

        $categories = new CategoryTest();
        $categories->category_en = $request->category_en;
        $categories->category_bn = $request->category_bn;
        if(empty($request->category_slug)){
            $categories->category_slug = str::slug($request->category_en);
        }else{
            $categories->category_slug = str::slug($request->category_slug);
        }
        $categories->save();

        $notification = array(
            'msg' =>'Category Added Successfully',
            'alert-type' =>'success',
        );

        //Session::flash('type','primary');
        //Session::flash('msg','Categories Added Successfully!');
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
        $categories = CategoryTest::where('id', $id)->first();

        $categories->category_en = $request->category_en;
        $categories->category_bn = $request->category_bn;
        if(empty($request->category_slug)){
            $categories->category_slug = str::slug($request->category_en);
        }else{
            $categories->category_slug = str::slug($request->category_slug);
        }
        $categories->save();

        $notification = array(
            'msg' =>'Category Updated Successfully',
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
    public function destroy( $id )
    {
        $category = CategoryTest::where('id', $id)->first();
        //$subcategory = SubCategory::where('id', $id)->first();
        //$subsubcategory = SubSubCategories::where('id', $id)->first();


        $category->subcatdel()->subsubcatdel()->delete();
        $category->subcatdel()->delete();
        $category->delete();

        $notification = array(
            'msg' =>'Category Deleted Successfully',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
    }
}

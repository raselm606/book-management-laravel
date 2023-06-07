<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.add');
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
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ]);
        $brand = new Brand();
        $brand->brand_name_en = $request->brand_name_en;
        $brand->brand_name_bn = $request->brand_name_bn;
        if(empty($request->slug_en)){
            $brand->slug_en = str::slug($request->brand_name_en);
        }else{
            $brand->slug_en = str::slug($request->slug_en);
        }
        if(empty($request->slug_bn)){
            $brand->slug_bn = str::slug($request->brand_name_bn);
        }else{
            $brand->slug_bn = str::slug($request->slug_bn);
        }

        if($request->hasFile('brand_image')){
            $file_name = 'image_'.rand(1000,9999).'.'.$request->file('brand_image')->getClientOriginalExtension();
            $upload_path =  $request->brand_image->storeAs('brand_image', $file_name);
            $upload_path = 'uploads/'.$upload_path;

            $brand->brand_image = $upload_path;
        }
        $brand->brand_url = $request->brand_url;

        $brand->save();

        $notification = array(
            'msg' =>'Brand added successfully',
            'alert-type' =>'success',
        );
        return redirect()->route('admin.all.brand')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edited($id)
    {
        //$brands = Brand::where('id', $id)->first();
        //return view('backend.pages.brand.edit',compact('brands'));
        return 'hello';
    }

    public function editWork($id){
        $brands = Brand::where('id', $id)->first();
        return view('backend.pages.brand.edit',compact('brands'));

        $brand->brand_name_en = $request->brand_name_en;
        $brand->brand_name_bn = $request->brand_name_bn;
        if(empty($request->slug_en)){
            $brand->slug_en = str::slug($request->brand_name_en);
        }else{
            $brand->slug_en = str::slug($request->slug_en);
        }
        if(empty($request->slug_bn)){
            $brand->slug_bn = str::slug($request->brand_name_bn);
        }else{
            $brand->slug_bn = str::slug($request->slug_bn);
        }

        if($request->hasFile('brand_image')){
            $file_name = 'image_'.rand(1000,9999).'.'.$request->file('brand_image')->getClientOriginalExtension();
            $upload_path =  $request->brand_image->storeAs('brand_image', $file_name);
            $upload_path = 'uploads/'.$upload_path;

            $brand->brand_image = $upload_path;
        }
        $brand->brand_url = $request->brand_url;

        $brand->save();

        $notification = array(
            'msg' =>'Brand added successfully',
            'alert-type' =>'success',
        );
        return redirect()->route('admin.all.brand')->with($notification);
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
        $brand = Brand::where('id', $id)->first();

        $brand->brand_name_en = $request->brand_name_en;
        $brand->brand_name_bn = $request->brand_name_bn;
        if(empty($request->slug_en)){
            $brand->slug_en = str::slug($request->brand_name_en);
        }else{
            $brand->slug_en = str::slug($request->slug_en);
        }
        if(empty($request->slug_bn)){
            $brand->slug_bn = str::slug($request->brand_name_bn);
        }else{
            $brand->slug_bn = str::slug($request->slug_bn);
        }
        if(!empty($brand)){
            if($request->hasFile('brand_image')){
                $file_name = 'image_'.rand(1000,9999).'.'.$request->file('brand_image')->getClientOriginalExtension();
                $upload_path =  $request->brand_image->storeAs('brand_image', $file_name);
                $upload_path = 'uploads/'.$upload_path;

                $brand->brand_image = $upload_path;
            }
        }

        $brand->brand_url = $request->brand_url;

        $brand->update();

        $notification = array(
            'msg' =>'Brand Edited successfully',
            'alert-type' =>'success',
        );
        return redirect()->route('admin.all.brand')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_brand = Brand::where('id', $id)->first();

        if(empty($delete_brand)){

            $notification = array(
                'msg' =>'Brand Error',
                'alert-type' =>'error',
            );
            return redirect()->back()->with($notification);
        }else{
            if(file_exists(public_path($delete_brand->brand_image))){
                unlink(public_path($delete_brand->brand_image));
            }
            $delete_brand->delete();

            $notification = array(
                'msg' =>'Brand Deleted Successful',
                'alert-type' =>'info',
            );
            return redirect()->back()->with($notification);
        }
    }
}

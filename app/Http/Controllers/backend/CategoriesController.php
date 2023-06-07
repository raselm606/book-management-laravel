<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(){
        $categories = CategoryBook::orderBy('id', 'desc')->get();
        $parent_category = CategoryBook::where('parent_id', null)->get();
        return view('backend.pages.categories.index', compact('categories', 'parent_category'));
    }

    public function store(Request $request){
        $rules=[
            'name' => 'required|unique:category_books',
            'slug' => 'nullable|unique:category_books',
            'description' => 'nullable',
        ];
        $request->validate($rules);

        $categories = new CategoryBook();
        $categories->name = $request->name;
        if(empty($request->slug)){
            $categories->slug = str::slug($request->name);
        }else{
            $categories->slug = str::slug($request->slug);
        }

        $categories->parent_id = $request->parent_id;
        $categories->description = $request->description;
        $categories->save();

        Session::flash('type','success');
        Session::flash('msg','Categories Added Successfully!');
        return redirect()->back();
    }
    public function update(Request $request, $id){
        $categories = CategoryBook::find($id);
        $request->validate([
            'name' => 'required|unique:category_books',
            'slug' => 'nullable|unique:category_books,slug,'.$categories->id,
            'description' => 'nullable',
        ]);

        $categories->name = $request->name;
        if(empty($request->slug)){
            $categories->slug = str::slug($request->name);
        }else{
            $categories->slug = str::slug($request->slug);
        }

        $categories->parent_id = $request->parent_id;
        $categories->description = $request->description;
        $categories->save();

        Session::flash('type','primary');
        Session::flash('msg','Categories Added Successfully!');
        return redirect()->back();

    }
    public function destroy($id){
        //delete all child categories
        $child_categoreis = CategoryBook::where('parent_id', $id)->get();
        foreach ($child_categoreis as $child){
            $child->Delete();
        }
        $category = CategoryBook::find($id)->first();
        $category->Delete();

        Session::flash('type','danger');
        Session::flash('msg','Categories Deleted Successfully!');
        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthorsController extends Controller
{
    public function index(){
        $author = Author::orderBy('id', 'desc')->get();
        return view('backend.pages.authors.index', compact('author'));
    }

    public function store(Request $request){
        $rules=[
            'name' => 'required',
            'description' => 'required',
        ];
        $request->validate($rules);

        $author = new Author();
        $author->name = $request->name;
        $author->link = str::slug($request->name);
        $author->description = $request->description;
        $author->save();

        Session::flash('type','success');
        Session::flash('msg','Author Added Successfully!');
        return redirect()->back();
    }
    public function update(Request $request, $id){
        $author = Author::find($id);
        $author->name = $request->name;
        $author->link = str::slug($request->name);
        $author->description = $request->description;
        $author->save();
        Session::flash('type','primary');
        Session::flash('msg','Author updated Successfully!');
        return redirect()->back();

    }
    public function destroy($id){
        $author = Author::find($id);
        $author->Delete();
        Session::flash('type','danger');
        Session::flash('msg','Author Deleted Successfully!');
        return redirect()->back();

    }
}

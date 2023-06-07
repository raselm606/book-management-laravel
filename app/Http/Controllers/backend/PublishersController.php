<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = publisher::orderBy('id', 'desc')->get();
        return view('backend.pages.publishers.index', compact('publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name' => 'required',
            'link' => 'nullable|url',
            'description' => 'required',
        ];
        $request->validate($rules);

        $publishers = new publisher();
        $publishers->name = $request->name;
        $publishers->link = $request->link;
        $publishers->address = $request->address;
        $publishers->outlet = $request->outlet;
        $publishers->description = $request->description;
        $publishers->save();

        Session::flash('type','success');
        Session::flash('msg','Publisher Added Successfully!');
        return redirect()->back();
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
        $publishers = publisher::find($id);
        $publishers->name = $request->name;
        $publishers->link = $request->link;
        $publishers->address = $request->address;
        $publishers->outlet = $request->outlet;
        $publishers->description = $request->description;
        $publishers->save();
        Session::flash('type','primary');
        Session::flash('msg', 'publisher '.$publishers->name.'  updated Successfully!');
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
        $publishers = publisher::find($id);
        $publishers->delete();
        Session::flash('type','danger');
        Session::flash('msg','Publisher Deleted Successfully!');
        return redirect()->back();
    }
}

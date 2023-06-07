<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
        return view('frontend.pages.index');
    }
    public function bookSingle(){
        return view('frontend.pages.book-view');
    }

    public function profile(){
        return view('frontend.pages.profile');
    }
    public function orderbook(){
        return view('frontend.pages.ordered-books');
    }
    public function uploadbook(){
        return view('frontend.pages.upload');
    }
}

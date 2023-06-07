<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        $total_books = Book::all()->count();
        $total_authors = Author::all()->count();
        $total_publishers = publisher::all()->count();
        return view('backend.pages.dashboard', compact('total_books','total_authors','total_publishers'));
    }

    public function profile(){
        $users = Auth::user();
        return view('backend.pages.profile', compact('users'));
    }


}

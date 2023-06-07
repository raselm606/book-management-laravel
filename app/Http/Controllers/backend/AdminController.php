<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(){
        return view('backend.pages.login');
    }
    public function adminLogin(Request $request){
        $rules =[
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
        $request->validate($rules);

        if(Auth::attempt(['email'=> $request->email,  'password' => $request->password])){
           if(Auth::user()->role == '1'){
                Session::flash('type', 'success');
                Session::flash('msg','Login Success');
                return redirect()->route('admin.dashboard');
            }else{
               Session::flash('type','danger');
               Session::flash('msg','Login error');
               return redirect()->back()->withInput();

           }

        }
        else{
            Session::flash('type','danger');
            Session::flash('msg','Login error');
            return redirect()->back()->withInput();
        }
    }

    //logout
    public function submitLogout(){
        if(Auth::check()){
            if(Auth::User()->role == '1'){
                Auth::logout();
                Session::flash('type','success');
                Session::flash('msg','Logout Success');
                return redirect()->route('index');
            }



        }else{
            Session::flash('type','danger');
            Session::flash('msg','Your are not logged In');
            return redirect()->route('login');
        }
    }



    public function signup(){
        return view('backend.pages.register');
    }

    public function forgetPass(){
        return view('backend.pages.forgot-password');
    }



}

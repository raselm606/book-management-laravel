<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{


    //signup page
    public function signup(){
        return view('frontend.pages.register');
    }

    //create user signup
    public function signupUser(Request $request){
        $rules = [
          'fullname' => 'required',
          'phone' => 'required|min:11|max:15|unique:users,phone',
          'username' => 'required|alpha_num|max:30|unique:users,username',
          'address' => 'max:50',
          'email' => 'required|email|',
          'password' => 'required|min:6',
          'cpassword' => 'required|min:6|same:password',
            'agree'=>'required',
        ];
        $request->validate($rules);

        $users = new User();
        $users->name = $request->fullname;
        $users->phone = $request->phone;
        $users->username = $request->username;
        $users->address = $request->address;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();

        Session::flash('type','success');
        Session::flash('msg','Signup Successfully done');
        return redirect()->back();
    }

    //login page
    public function login(){
        return view('frontend.pages.login');
    }

    //login user
    public function loginUser(Request $request){
        $rules =[
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
        $request->validate($rules);

        if(Auth::attempt(['email'=> $request->email,  'password' => $request->password]) && Auth::user()->role == '0'){

                Session::flash('type', 'success');
                Session::flash('msg', 'Login Success');
                return redirect()->route('profile');

        }else{
            Session::flash('type','danger');
            Session::flash('msg','Login error');
            return redirect()->back()->withInput();
        }
    }

    //logout
    public function submitLogout(){
        if(Auth::check()){
            if(Auth::User()->role == '0'){
                Auth::logout();
                Session::flash('type','success');
                Session::flash('msg','Logout Success');
                return redirect()->route('index');
            }else{
                Session::flash('type','danger');
                Session::flash('msg','Your are valid user');
                return redirect()->route('login');

            }
            

            
        }else{
            Session::flash('type','danger');
            Session::flash('msg','Your are not logged In');
            return redirect()->route('login');
        }
    }





}

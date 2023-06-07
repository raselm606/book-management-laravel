<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::User()->role == '1'){
                return $next($request);
            }else{
                Session::flash('type','danger');
                Session::flash('msg','Admin not found');
                return redirect()->route('index');

            }

        }else{
            Session::flash('type','danger');
            Session::flash('msg','you are not loggedin');
            return redirect()->route('index');
        }
    }
}

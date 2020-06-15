<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()==true && Auth::user()->role == "admin" or Auth::user()->role == "nhanvien"){
            return $next($request);
        }else{
            $request->session()->flash('fail', 'Thất Bại');
            return redirect('/logout');
        }
    }
}

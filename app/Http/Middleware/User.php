<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
        if(Auth::check()){
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                if($request->id){
                    if(Auth::user()->id == $request->id){
                        return $next($request);
                    }
                    return redirect()->route('user-biodata', Auth::user()->id);
                }else{
                    return $next($request);
                }
            }
            return redirect('/admin');
        }
        return redirect('/');
    }
}

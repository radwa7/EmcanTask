<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
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
        //checks if user is authenticated
        if (Auth::check()) {
            //check if user is admin
            if (Auth::user()->role == 'admin') {
                return $next($request);
            }else{
                //denies access for non admin
                return redirect('/home')->with('message','Access Denied');
            }
        //denies access for not authenticated users
        }else{
            return redirect('/login')->with('message','Please Log in first');

        }

    }
}

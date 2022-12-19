<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorRoleMiddleware
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
            //check if user is author
            if (Auth::user()->role == 'author') {
                return $next($request);
            }else{
                //denies access for non authors
                return redirect('/home')->with('message','Access Denied');
            }

        }else{
            //denies access for not authenticated users
            return redirect('/login')->with('message','Please Log in first');

        }
    }
}

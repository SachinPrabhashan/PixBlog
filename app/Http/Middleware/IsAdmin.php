<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
/*
    public function handle(Request $request, Closure $next)
    {
        //if Admin user logged in Admin/dashboard link will work otherwise redirect to the New Post. route('home');
        //this function disable the chance to access admin dashboard by USER.
        //IsAdmin function in Model>User.php
        if (auth()->user()->IsAdmin()) {
            return $next($request);
        }else{
            return back();
        }

    }
*/


/*
//admin redirect work for this
public function handle($request, Closure $next)
{
    if (Auth::check() && Auth::user()->role === ADMIN) {
        return redirect('/admin/dashboard');
    }

    return $next($request);
}

*/
}

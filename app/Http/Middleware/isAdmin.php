<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class isAdmin
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
        
        //Write a middleware that allows only Users who are Admin & Active to access /admin page
        
        if(Auth::check()){
            if(Auth::user()->isAdmin())

                return $next($request);   
        }

        return redirect('/');
        
    }
}

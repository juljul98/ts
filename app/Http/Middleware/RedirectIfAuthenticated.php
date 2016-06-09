<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      // Sample of Protecting Routes
   
      if (Auth::guard($guard)->check()) {
        if (Auth::user($guard)->userlevel == 1) {
          return redirect('/admin');
        }
        if (Auth::user($guard)->userlevel == 3) {
          return redirect('/home');
        }
        return redirect('/login');
      }
        return $next($request);
    }
}

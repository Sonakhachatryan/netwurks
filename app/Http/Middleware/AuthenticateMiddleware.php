<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard)
    {
        if (!Auth::guard($guard)->check()) {
            if ($guard == 'customer' || $guard == 'associate' )
                return redirect('/');

            if ($guard == 'admin')
                return redirect('/admin/login');
        }
        
        return $next($request);
    }
}

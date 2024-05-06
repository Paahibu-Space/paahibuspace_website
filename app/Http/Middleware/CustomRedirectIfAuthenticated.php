<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class CustomRedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $route = ($guard === 'admin') ? 'admin.home' : 'user.home';
            return redirect()->route($route);
        }

        return $next($request);
    }
}

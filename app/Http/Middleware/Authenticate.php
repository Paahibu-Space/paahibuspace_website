<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin-home') || $request->is('admin-home/*')) {
                return route('admin.login');
            }
            if ($request->is('user-home') || $request->is('user-home/*')) {
                return route('user.login');
            }
            return route('user.login');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminSettingsPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $param): Response
    {
        if (Auth::guard('admin')->check()) {
            $user_role = \App\Models\AdminRole::where('id', auth()->guard('admin')->user()->role)->first();
            $all_permission = json_decode($user_role->permission);
            if (in_array(strtolower(str_replace(' ','_',$param)), $all_permission)) {
                return $next($request);
            }
        }
        return redirect()->route('admin.home');
    }
}

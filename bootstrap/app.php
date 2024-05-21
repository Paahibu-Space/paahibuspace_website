<?php

use App\Http\Middleware\CustomRedirectIfAuthenticated;
use App\Http\Middleware\CustomAuthenticate;
use App\Http\Middleware\AdminSettingsPermission;
use App\Http\Middleware\MaintainsMode;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->redirectGuestsTo('/login/admin');
        $middleware->alias([
            'guest' => CustomRedirectIfAuthenticated::class,
            'auth' => CustomAuthenticate::class,
            'adminPermissionCheck' => AdminSettingsPermission::class,
            'maintains_mode' => MaintainsMode::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

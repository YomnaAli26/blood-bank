<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function (){
            Route::middleware('web')
                ->prefix('admin/dashboard')
                ->as('admin.')
                ->namespace('App\Http\Controllers\Admin')
                ->group(base_path("routes/admin.php"));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectUsersTo(function (){
           if (Auth::guard('admin')->check())
           {
               return route('admin.dashboard');
           }

        });
        $middleware->redirectGuestsTo(function (){
            if (Auth::guard('admin')->guest())
            {
                return route('admin.login');
            }
        });

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

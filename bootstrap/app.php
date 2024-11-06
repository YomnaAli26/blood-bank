<?php

use App\Http\Middleware\AutoCheckPermission;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

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
           if (Auth::guard('admin')->guest())
           {
               return route('admin.dashboard');
           }
           if (Auth::guard('web')->guest())
           {
               return route('site.home');
           }

        });
        $middleware->redirectGuestsTo(function () {
            if (Auth::guard('admin')->check()) {
                return route('admin.login');
            }

            if (Auth::guard('web')->check()) {
                return route('login');
            }

            return route('login');
        });

        $middleware->alias([
            'auto-check-permission' => AutoCheckPermission::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (PermissionDoesNotExist $permissionDoesNotExist){
            return to_route("admin.permissions.index")->with('danger', $permissionDoesNotExist->getMessage());
        });
    })->create();

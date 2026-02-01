<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleManager::class,
        ]);
        // utk mengarahkan ke halaman login, jika user belum login dan mau mencoba mengakses halaman dashboard atau yg lainnya 
        $middleware->redirectGuestsTo(fn () => route('Auth.login'));
        // untuk mengatur user yg sudah login, diarahkan ke halaman sesuai rolenya
        $middleware->redirectUsersTo(function () {
            if (auth()->user()->role === 'admin') {
                return route('Admin.dashboard');
            }
            return route('User.dashboard');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

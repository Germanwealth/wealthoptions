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
        // Trust proxy headers for HTTPS behind load balancer/reverse proxy
        $middleware->trustProxies(at: '*');
        // Future auth/admin middleware aliases can be registered here.
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

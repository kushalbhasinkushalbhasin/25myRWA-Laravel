<?php

use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\IdentifyClient;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\BridgeCorePhpSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            IdentifyClient::class, // ✅ Add this to web middleware group
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
            BridgeCorePhpSession::class,
        ]);

        $middleware->alias([
            'role'   => RoleMiddleware::class,
            'client' => IdentifyClient::class, // Alias is optional if you're applying class directly
            'user'   => BridgeCorePhpSession::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
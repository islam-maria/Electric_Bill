// In app/Http/Kernel.php

protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],

    'api' => [
        'throttle:60,1',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],

    // Custom auth middleware group
    'auth' => [
        \App\Http\Middleware\Authenticate::class,
    ],
];
'admin' => \App\Http\Middleware\AdminMiddleware::class,

<?php

return [
    'paths' => [
        'api' => 'api',
        'health' => '/up',
    ],
    'middleware' => ['api', 'auth:sanctum'],
    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', 'localhost,127.0.0.1,127.0.0.1:8000,localhost:8000')),
    'expiration' => null,
    'guard' => ['web'],
    'providers' => [
        App\Providers\AppServiceProvider::class,
    ],
];

<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot(): void
    {
        $this->registerPolicies();

        if (class_exists('\Illuminate\Auth\Events\Registered')) {
            // no-op for now
        }
    }
}

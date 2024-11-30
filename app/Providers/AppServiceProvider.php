<?php

namespace App\Providers;

use App\Policies\TeamPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        # Gates for different user types
        Gate::define('admin', function($user) {
            return $user->type == 1;
        });

        Gate::define('verified', function($user) {
            return $user->type == 2;
        });

        # Team gates
        Gate::define('create-team', [TeamPolicy::class, 'create']);
    }
}

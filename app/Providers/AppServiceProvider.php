<?php

namespace App\Providers;

use App\Policies\TeamPolicy;
use App\Policies\PostPolicy;
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

        Gate::define('authorised', function($user, $post) {
            return $user->type === 1 || $user->id === $post->user_id;
        });

        # Team gates
        Gate::define('create-team', [TeamPolicy::class, 'create']);
        Gate::define('delete-team', [TeamPolicy::class, 'delete']);

        # Post gates
        Gate::define('delete-post',[PostPolicy::class, 'delete']);
    }
}

<?php

namespace App\Providers;

use App\Models\City;
use App\Policies\CityPolicy;
use App\Policies\TeamPolicy;
use App\Policies\PlayerPolicy;
use App\Policies\VenuePolicy;
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

        # City gates
        Gate::define('create-city', [CityPolicy::class, 'create']);
        Gate::define('delete-city', [CityPolicy::class, 'delete']);

        # Team gates
        Gate::define('create-team', [TeamPolicy::class, 'create']);
        Gate::define('delete-team', [TeamPolicy::class, 'delete']);

        # Player gates
        Gate::define('create-player', [PlayerPolicy::class, 'create']);
        Gate::define('delete-player', [PlayerPolicy::class, 'delete']);

        # Venue gates
        Gate::define('create-venue', [VenuePolicy::class, 'create']);
        Gate::define('delete-venue', [VenuePolicy::class, 'delete']);

        # Post gates
        Gate::define('delete-post',[PostPolicy::class, 'delete']);
        Gate::define('edit-post',[PostPolicy::class, 'edit']);
        Gate::define('update-post',[PostPolicy::class, 'update']);
    }
}
<?php

namespace App\Providers;

use App\Events\OrderedPizzaStatusUpdated;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        // Event::listen(
        //     OrderedPizzaStatusUpdated::class,
        // );
    }
}

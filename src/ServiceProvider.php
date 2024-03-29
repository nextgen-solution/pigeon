<?php

namespace NextGenSolution\Pigeon;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use NextGenSolution\Pigeon\Pigeon;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Pigeon::class, function ($app) {
            return new Pigeon(new Client());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/pigeon.php' => config_path('pigeon.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/pigeon.php', 'pigeon'
        );
    }
}

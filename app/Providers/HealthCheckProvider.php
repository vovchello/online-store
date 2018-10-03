<?php

namespace App\Providers;

use App\Servises\HealthCheckInterface;
use App\Servises\HealthServices\GuzzleServise;
use App\Servises\HealthServices\HealthChecker;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class HealthCheckProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HealthCheckInterface::class, GuzzleServise::class);
    }
}

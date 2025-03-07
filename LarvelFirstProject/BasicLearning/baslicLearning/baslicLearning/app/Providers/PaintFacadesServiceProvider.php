<?php

namespace App\Providers;

use App\Services\MyCustomService;
use Illuminate\Support\ServiceProvider;

class PaintFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('my-custom-service', function () {

            return new MyCustomService();

        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

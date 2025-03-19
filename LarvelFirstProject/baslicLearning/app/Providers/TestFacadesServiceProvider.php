<?php

namespace App\Providers;

use App\TestFacades\TestFacades;
use Illuminate\Support\ServiceProvider;

class TestFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(TestFacades::class, function () {

            return new TestFacades();
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

<?php

namespace App\Providers;

use app\Test\Facades\TestFacades as FacadesTestFacades;
use App\TestFacades\TestFacades;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class TestFacadesInterfaceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        App::bind('test',function() {
            return new FacadesTestFacades;
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

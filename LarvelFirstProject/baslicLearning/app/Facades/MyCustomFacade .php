<?php

namespace App\Facades;



use Illuminate\Support\Facades\Facade;



class MyCustomFacade extends Facade

{

    protected static function getFacadeAccessor()

    {

        return 'my-custom-service'; // This should match the service alias you set in the provider

    }

}
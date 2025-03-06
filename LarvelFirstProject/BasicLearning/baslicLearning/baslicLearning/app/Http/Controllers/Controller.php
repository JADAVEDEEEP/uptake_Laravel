<?php

namespace App\Http\Controllers;

use App\Services\MyService as ServicesMyService;
use App\TestFacades\TestFacades;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
  
    protected $myService,$test;



    public function __construct(ServicesMyService $myService,TestFacades $test)

    {

        $this->myService = $myService;
        $this->test=$test;

    }



    public function someMethod() 

    {

        $result = $this->myService->doSomething();
        

        return $result;

    }
   public function facades(){

    $test=$this->test->testingFacades();

    return $test;
   }

public function combinedMethod()
{
    $someMethodResult = $this->someMethod();
    $facadesResult = $this->facades();
    return ['someMethod' => $someMethodResult, 'facades' => $facadesResult];
}
}

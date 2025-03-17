<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvisionServer extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id,$Name)
    {
        return "Name : $Name"."<br>Number : $id";
    }
    public function post($Name){
     
        return $Name;   
    }
}

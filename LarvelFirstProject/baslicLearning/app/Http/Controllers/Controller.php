<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\MyCustomService;
use App\Services\MyService as ServicesMyService;
use App\TestFacades\TestFacades;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request as FacadesRequest;

class Controller extends BaseController
{
    public function show(User $user){

      $user=User::all();
        return ['result'=>$user];
    }
}

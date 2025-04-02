<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function deso(){
    $responce=User::all();    
    return view('Users',['responce'=>$responce]);
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view($name){
        return view('Auth.login',['user'=>$name]);
    }
    public function View_two(){
        return view('Auth.registration');
    }
    
}

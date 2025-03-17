<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function post(Request $request){
        echo "Method : ".$request->method();
        echo "<br>";
        echo "Path : ".$request->path();
        echo "<br>";
        echo "Url : ".$request->url();
        echo "<br>";
        echo "CSRF TOKEN : ".$request->input('_token');
        echo "<br>";
        echo "Name : ".$request->input('email');
        echo "<br>";
        echo "Password : ".$request->input('password');     
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function get(){
        return"this is get";
    }
    function post(){
        return"this is post";
    }
}

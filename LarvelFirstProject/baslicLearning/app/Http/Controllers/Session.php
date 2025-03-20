<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Session extends Controller
{
    public function Login(Request $request){
        $request->session()->put('user',$request->input('user'));
       return redirect('profile2');
    }
}

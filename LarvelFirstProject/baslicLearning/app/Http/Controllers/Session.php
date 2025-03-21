<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Session extends Controller
{
    // public function Login(Request $request){
    //     $request->session()->put('user',$request->input('user'));
    //    return redirect('profile2');
    // }
    public function Login(Request $request){
   $request->validate(
    [
      'user'=>'required',
       'password'=>'required'  
    ]
    );
    $request->session()->put('user',$request->input('user'));
    $request->session()->put('password',$request->input('password'));
     return redirect('profile2');
     }
    }

   

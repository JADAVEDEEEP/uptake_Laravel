<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Practice extends Controller
{
    public function post(Request $request){
   //THIS IS VALIDATION 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

   //QUERY BUILDER WIT ERM
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        $request->session()->put('name', $request->input('name'));
        $request->session()->put('email', $request->input('email'));

        
        return redirect('profile2');
    }
}
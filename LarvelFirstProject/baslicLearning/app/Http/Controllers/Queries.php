<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class Queries extends Controller
{
    public function quries(){
    //  $user=DB::select('select * from users');
    // $user=DB::table('users')->where('name','deep')->get();
    //  return view('Queries',['user'=>$user]) ;  

     
    // $user = DB::table('users')->max('id');
    
// $user = DB::table('users')
// ->join('order', 'users.id', '=', 'order.user_id')
// ->select('users.*', 'order.price')
// ->get();
    // return $user;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    // public function post(Request $request){
    //     echo "Method : ".$request->method();
    //     echo "<br>";
    //     echo "Path : ".$request->path();
    //     echo "<br>";
    //     echo "Url : ".$request->url();
    //     echo "<br>";
    //     echo "CSRF TOKEN : ".$request->input('_token');
    //     echo "<br>";
    //     echo "Name : ".$request->input('email');
    //     echo "<br>";
    //     echo "Password : ".$request->input('password');     
    //     echo "<br>";
    //     echo "IP Address : ".$request->ip();
    // }

        public function post(Request $request){
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->save();
        }
        public function index() {
            $users = DB::select('select * from users');
            return view('LoginUser',['users'=>$users]);
         }
        
    }



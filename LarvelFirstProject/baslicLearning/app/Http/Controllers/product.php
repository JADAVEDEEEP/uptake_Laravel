<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class product extends Controller
{
    public function pro(){
        //QUERY BUILDERS WAY
        // $user=customer::all();
        // return $user;
    
    //ERMO MODEL WAY
    $user=DB::table('customers')->insert([
        'lastname'=>"rahu",
    ]);
    if($user){
        return "data inserted";
    }else{
        return "we faield";
    }
}

}

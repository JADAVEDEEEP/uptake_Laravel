<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecutionController extends Controller
{
    public function bye($id){
        return view('znmd',['id'=>$id]);
    }
}

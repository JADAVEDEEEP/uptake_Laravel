<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class RollController extends Controller
{
    public function index(){
   
    }
    public function create(){
        $permissionss = ModelsPermission::orderBy('name','ASC')->get();
        return view('role.create',['permissionss'=>$permissionss]);
    }
    public function store(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }
    
    
    
}

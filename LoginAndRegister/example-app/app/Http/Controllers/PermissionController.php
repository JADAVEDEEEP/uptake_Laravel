<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //this will sjow the permsion page 
    public function index(){
        $permssions=Permission::orderBy('created_at','DESC')->paginate(3);
        return view('permissions.list',['permissions'=>$permssions]);
    }
    public function create(){
     return view('permissions.create');
    }
    public function store(Request $request){
     $validator=Validator::make($request->all(),[
       'name'=>'required|unique:permissions|min:3'
     ]);
     if($validator->passes()){
        Permission::create(['name'=>$request->name]);
        return redirect()->route('permissions.index')->with('success','Permission Added');


     }else{
        return redirect()->route('permissions.create')->withInput()->withErrors($validator);
     }
    }
    public function edit($id){
    $permssions=Permission::findorFail($id);
    return view('permissions.edit',['permssions'=>$permssions]);
    }
    public function update($id,Request $request){
        $permssions=Permission::findorFail($id);
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:3|unique:permissions,name,'.$id.',id'
          ]);
          if($validator->passes()){
            
           
            //  Permission::create(['name'=>$request->name]);
             $permssions->name=$request->name;
             $permssions->save();
            return redirect()->route('permissions.index')->with('success','Permission Added');
     
     
          }else{
             return redirect()->route('permissions.edit',$id)->withInput()->withErrors($validator);
          }
        
    }
    public function destroy(Request $request){
    $id=$request->id;
    $permission=Permission::findorFail($id);

    if($permission==null){
        session()->flash('error','permission not found ');
       return response()->json([
        'status'=>false
       ]);
    }
    $permission->delete();
    session()->flash('error','deleted succeusfully');
       return response()->json([
        'status'=>false
       ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Models\colors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    public function index(){
        $color=colors::orderBy('Color_name','DESC')->paginate(50);
        return view('colors.list',['color'=>$color]);
    }
    public function create(){
        $color = colors::orderBy('Color_name','ASC')->get();
        return view('colors.create',['color'=>$color]);
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'Color_name'=>'required|unique:colors|min:3'
          ]);
          if($validator->passes()){
            $color = colors::create(['color_name'=>$request->Color_name]);

             if(!empty($request->permission)){
                foreach ($request->permission as $name) {
                    $color ->givePermissionTo($name);
                }
             }
            
             return redirect()->route('color.index')->with('success','Permission Added');
     
     
          }else{
             return redirect()->route('color.create')->withInput()->withErrors($validator);
          }
         
    }
    public function edit($Color_id) {
        
        $color = colors::find($Color_id);
        
        return view('colors.edit', ['color' => $color]);
    }
    
    public function update($Color_id, Request $request) {
        $color = colors::find($Color_id);
        
        $validator = Validator::make($request->all(), [
            'Color_name' => 'required|min:3|unique:colors,Color_name,' . $Color_id . ',Color_id'
        ]);
        
        if ($validator->passes()) {
            
            $color->Color_name = $request->Color_name; 
            
            
            $color->save();
        
            return redirect()->route('color.index')->with('success', 'Color updated successfully!');
        } else {
            return redirect()->route('color.edit', $Color_id)->withInput()->withErrors($validator);
        }
    }
    
         
    
    public function destroy($Color_id){
        $product = colors::find($Color_id);
        $product->delete();

        return redirect()->route('color.index')->with('success', 'Product deleted successfully!');
    }
    
    
}

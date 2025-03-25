<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index(){
        $size=size::orderBy('size_name','ASC')->paginate(10);
        return view('size.list',['size'=>$size]);
    }
    public function create(){
        $size = size::orderBy('size_name','ASC')->get();
        return view('size.create',['size'=>$size]);
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'size_name'=>'required|unique:sizes|min:3'
          ]);
          if($validator->passes()){
            $size = size::create(['size_name'=>$request->size_name]);

             if(!empty($request->permission)){
                foreach ($request->permission as $name) {
                    $size ->givePermissionTo($name);
                }
             }
            
             return redirect()->route('size.index')->with('success','Permission Added');
     
     
          }else{
             return redirect()->route('size.create')->withInput()->withErrors($validator);
          }
         
    }
    // public function edit($color_id) {
    //     // Find the color by ID, or fail if not found
    //     $color = colors::findOrFail($color_id);
        
    //     // Return the edit view with the color data
    //     return view('color.edit', ['color' => $color]);
    // }
    
    // public function update($color_id, Request $request) {
    //     // Find the color by ID, or fail if not found
    //     $color = colors::findOrFail($color_id);
    
    //     // Validate the request data
    //     $validator = Validator::make($request->all(), [
    //         'color_name' => 'required|min:3|unique:colors,color_name,' . $color_id . ',color_id'
    //     ]);
    
    //     // Check if validation passes
    //     if ($validator->passes()) {
    //         // Update the color name from the request data
    //         $color->color_name = $request->color_name; // Make sure this matches the column name in your database
            
    //         // Save the updated color
    //         $color->save();
    
    //         // Sync permissions if they exist in the request
    //         if (!empty($request->permission)) {
    //             $color->syncPermissions($request->permission); // Sync permissions based on the request
    //         } else {
    //             // If no permissions are passed, clear the permissions
    //             $color->syncPermissions([]);
    //         }
    
    //         // Redirect to the color index with a success message
    //         return redirect()->route('color.index')->with('success', 'Color updated successfully!');
    //     } else {
    //         // Redirect back to the edit page with validation errors and input
    //         return redirect()->route('color.edit', $color_id)->withInput()->withErrors($validator);
    //     }
    // }
         
    
    public function destroy(){

    }
}

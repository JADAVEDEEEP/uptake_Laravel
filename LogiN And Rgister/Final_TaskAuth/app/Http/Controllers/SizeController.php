<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index(){
        $size=size::orderBy('Size_name','ASC')->paginate(10);
        return view('size.list',['size'=>$size]);
    }
    public function create(){
        $size = size::orderBy('size_name','ASC')->get();
        return view('size.create',['size'=>$size]);
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'Size_name'=>'required|unique:sizes|min:3'
          ]);
          if($validator->passes()){
            $size = size::create(['size_name'=>$request->Size_name]);

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
    public function edit($Size_id) {
        // Find the color by ID, or fail if not found
        $size =size ::find($Size_id);
        
        // Return the edit view with the color data
        return view('size.edit', ['size' => $size]);
    }
    
    public function update($Size_id, Request $request) {
        // Find the color by ID, or fail if not found
        $size = size::findOrFail($Size_id);
    
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'Size_name' => 'required|min:3|unique:Sizes,Size_name,' . $Size_id . ',Size_id'
        ]);
    
        // Check if validation passes
        if ($validator->passes()) {
            // Update the color name from the request data
            $size->Size_name = $request->Size_name; // Make sure this matches the column name in your database
            
            // Save the updated color
            $size->save();
    
            // Sync permissions if they exist in the request
            // if (!empty($request->permission)) {
            //     $size->syncPermissions($request->permission); // Sync permissions based on the request
            // } else {
            //     // If no permissions are passed, clear the permissions
            //     $size->syncPermissions([]);
            // }
    
            // Redirect to the color index with a success message
            return redirect()->route('size.index')->with('success', ' updated successfully!');
        } else {
            // Redirect back to the edit page with validation errors and input
            return redirect()->route('size.edit', $Size_id)->withInput()->withErrors($validator);
        }
    }
         
    public function destroy($Size_id)
    {
       
        $size = Size::find($Size_id);
    
        $size->delete();
    
        
        return redirect()->route('size.index')->with('success', 'Size deleted successfully.');
    }
}

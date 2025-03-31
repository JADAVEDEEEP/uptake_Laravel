<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.list', ['users' => $users]);
    }

  
    public function create()
    {
        
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
        dd($roles);
    }

   
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); 
        $user->save();

    
      

        return redirect()->route('users.index');
    }

    
    public function show(string $id)
    {
    
    }

  
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
       
        return view('users.edit', [
            'user' => $user,
            
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

       
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
      
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.edit', $id)->withInput()->withErrors($validator);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        
        return redirect()->route('users.index');
    }

    
    public function destroy(string $id)
    {
        $size = User::find($id);
    
        $size->delete();
    
        
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

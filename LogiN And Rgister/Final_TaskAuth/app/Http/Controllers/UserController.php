<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role; // Import the Role model from Spatie package

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all roles available to assign to the user
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
        dd($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
          'roles' => 'required|array', // Validate that roles is an array
        'roles.*' => 'exists:roles,id', // Ensure each role ID exists in the roles tablehe role is valid
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.create')->withInput()->withErrors($validator);
        }

        // Create the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->save();

        // Assign the role to the user
        $user->assignRole($request->role);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        // $roles = Role::all(); // Get all available roles
        // $hasRoles = $user->roles->pluck('id')->toArray(); // Get the current roles for the user

        return view('users.edit', [
            'user' => $user,
            // 'roles' => $roles,
            // 'hasRoles' => $hasRoles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'role' => 'required|exists:roles,id', // Ensure the role is valid
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.edit', $id)->withInput()->withErrors($validator);
        }

        // Update the user information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Sync roles for the user (this will remove old roles and assign the new one)
        // $user->syncRoles($request->role);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

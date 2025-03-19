<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function show($id):View
    {
        return view('users',[ 'user' => User::findOrFail($id)]);
    }
}

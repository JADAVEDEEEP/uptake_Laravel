<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

//API REFERANCE : http://localhost:8000/api/member

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        return ['result'=>$user];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

         return ['result'=>'list Created'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        return ['result'=>'New Member Added'];
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
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        return  ["$id : Numbers Member Updated"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return  ["$id : Numbers Member Deleted"];
    }
}

<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\studentcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/////////////////////////////////////////RESOURCES CONTROLLER /////////////////////////////////////

    Route::resource('member',PhotoController::class);


    Route::get('/students',[studentcontroller::class,'list']);
    Route::post('add-students',[studentcontroller::class,'addstudent']);
    Route::put('update-students',[studentcontroller::class,'updateStudent']);
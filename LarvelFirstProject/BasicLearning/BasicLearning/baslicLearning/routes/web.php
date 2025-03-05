<?php

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\ServiceContainerLearning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 

Route::get('/', function (Controller $controller) {
    dd($controller::class);
}); 

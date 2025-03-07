<?php

use App\Facades\MyCustomFacade;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use app\Test\Facades\TestFacades as FacadesTestFacades;
use App\Test\StaticFacades;
use App\TestFacades\TestFacades;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
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

////////////////////////////////////////////////SERVICE CONTAINER AND SERVICE PROVIDER ROUTING /////////////////

Route::get('/', [Controller::class, 'combinedMethod']);

Route::get('/test', [StaticFacades::class,'testingFacades']);

//////////////////////////////////////////////////////////BASIC ROUTING /////////////////////////////

Route::get('/home',function(){
    return view('welcome');
});

//facades methods 
/////////////////////////////////////////////////////FACADES CACHE/////////////////////////////
// dd(Cache::get(Controller::class,'combinedMethod'));

///////////////////////////////////////////USER ROUTE USER METHODS/////////////////////////////

Route::get('/user', [UserController::class, 'get']);

Route::post('/user', [UserController::class, 'post']);

Route::get('/users',[Controller::class,'store']);


Route::view('form','user');

////////////////////////////////////////DEPENDANCY INJECTION IN ROUTS//////////////////////////

Route::get('/users',function(Request $request){
    return $request;
});

//////////////////REDIRECT ROUTES ////////////////////////////////////////////////////////
Route::redirect('/here', '/user');

////////////////////////////////////View Routes //////////////////////////////////////////

Route::view('/welcome', 'welcome');
 
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
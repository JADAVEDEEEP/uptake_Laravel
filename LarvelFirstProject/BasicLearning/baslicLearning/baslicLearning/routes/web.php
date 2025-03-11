<?php

use App\Facades\MyCustomFacade;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckRequiredHeader;
use app\Test\Facades\TestFacades as FacadesTestFacades;
use App\Test\StaticFacades;
use App\TestFacades\TestFacades;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
////////////////////////////////////INTERFACE SERVICE PROVIDER  //////////////////////////////////////////

Route::get('sas',[Controller::class,'doAwesome']);

///////////////////////////////////////////WELCOME SCREEN VIEW SCREEN WITH ANCHOR TAGS /////////////////////////////////////

// Route::get('/',function(){
//     return View('welcome');
// });


// Route::get('/aboutus',function(){
//     return View('aboutus');
// });

// Route::get('/register',function(){
//     return View('register');
// });
///////////////////////////////////////ROUTE PERAMETERS//////////////////////////////////////



// Route::get('/post2/{id?}/comment/{commentid?}',function($id=null,$comment=null){
//     if($id){
//         return "<h1>India Virat : ".$id."</h1><h1>India Rohit : ".$comment."</h1>";
//     }else{
//         return "<h1>No ids</h1>";
//     }
// });
//////////////////////////////////////////ROUTE PERMETERS WITH REGULER EXPRESSION /////////////////////////////////

// Route::get('/post2/{id?}/comment/{commentid?}',function($id,$comment){
//     return 'Id Would Be Number : '.$id."<br> Only Alphabet Allowed : ".$comment;
//      })->where('id','[0-9]+')->whereAlphaNumeric('comment');
     
    
 
    //WhereIN 
    
    Route::get('/category/{category}', function (string $category) {
        return $category;
    })->whereIn('category', ['movie', 'song', 'painting']);

    //WhereNumber
     
    Route::get('/post1/{id?}', function (string $id) {
        return"Only Numbers : ". $id;
    })->whereNumber('id');

    //WhereAlpha    
    
    Route::get('/post2/{Name?}', function (string $Name) {
        return"Only Alpha Numerics : ". $Name;
    })->whereAlpha('Name');

     //WhereAlphaNumeric  

    Route::get('/post3/{Name?}', function (string $Name) {
        return" Alpha Numerics : ". $Name;
    })->whereAlphaNumeric('Name');

///////////////////////////////////////////////////////////NAMED ROUTES ///////////////////////////////////////////////


// Route::get('welcome',function(){
//     return view('welcome');
// });

// Route::get('/about',function(){
//     return view('aboutus');
// })->name('about-us');

// Route::get('/regis',function(){
//     return view('register');
// })->name('regist-name');

////////////////////////////////////////////////////////////GROUP ROUTES /////////////////////////////

Route::prefix('page')->group(function(){

    Route::get('welcome',function(){
        return view('welcome');
    });
    
    Route::get('/about',function(){
        return view('aboutus');
    })->name('about-us');
    
    Route::get('/regis',function(){
        return view('register');
    })->name('regist-name');
    
});


Route::get('/protected-page', function () {

    // Route logic

})->middleware(CheckRequiredHeader::class); 
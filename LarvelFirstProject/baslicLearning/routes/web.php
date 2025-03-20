<?php

use App\Facades\MyCustomFacade;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExecutionController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckRequiredHeader;
use App\Models\User;
use app\Test\Facades\TestFacades as FacadesTestFacades;
use App\Test\StaticFacades;
use App\TestFacades\TestFacades;
use AuthenController as GlobalAuthenController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
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

// Route::get('/user', [UserController::class, 'get']);

// Route::post('/user', [UserController::class, 'post']);

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
    
    Route::get('/abou',function(){
        return view('aboutus');
    })->name('about-us');
    
    Route::get('/regis',function(){
        return view('auth.registration');
    })->name('regist-name');

    Route::get('/Login',function(){
        return view('auth.login');
    })->name('login');

   
    
});

//////////////////////////////////////////////////////MIIDDLEWARE/////////////////////////////////
 
Route::get('/protected-page', function () {
})->middleware(CheckRequiredHeader::class); 

//////////////////////////////////////////////////////MIDDLEWARE EXECUTION /////////////
Route::controller(AuthenController::class)->group(function(){
    Route::get('/registration','registration')->middleware('alreadyLoggedIn');
    Route::post('/registration-user','registerUser')->name('register-user');
    Route::get('/login','login')->middleware('alreadyLoggedIn');
    Route::post('/login-user','loginUser')->name('login-user');
    Route::get('/dashboard','dashboard')->middleware('isLoggedIn');
    Route::get('/logout','logout');
});

///////////////////////////////////////////////////CONTROLLER//////////////////////////

Route::get('/raju/{id}', [LearningController::class, 'show']);

Route::get('znmd/{id}',[ExecutionController::class,'bye']);

///////////////////////////////////////////INVOKE CONTROLLER ////////////////////////////

Route::get('dif3/{id}/{Name}',ProvisionServer::class);

///////////////////////////////////////////////INVOKE CONTROLLER WITH GROUP ///////////////////////

Route::controller(ProvisionServer::class)->group((function(){
    Route::get('/dif/{id}','__invoke')->whereNumber('id');

    Route::get('/dif2/{Name}','post')->whereAlpha('Name');
}));


////////////////////////////////////////////CONTROLLER WITH THE MIDDALWARE AND ROUTES ///////////////

// Route::controller(AuthenController::class)->group(function(){
//     Route::get('/registration','registration')->middleware('alreadyLoggedIn');
//     Route::post('/registration-user','registerUser')->name('register-user');
//     Route::get('/login','login')->middleware('alreadyLoggedIn');
//     Route::post('/login-user','loginUser')->name('login-user');
//     Route::get('/dashboard','dashboard')->middleware('isLoggedIn');
//     Route::get('/logout','logout');
// });

/////////////////////////////////////////REQUEST LARAVEL///////////////////////////////////

// Route::post('/LoginUser',[RequestController::class,'post']);
// Route::view('form','LoginUser');

//WITH DATABASE

Route::post('/LoginUser',[RequestController::class,'post']);

Route::get('/LoginUser',[RequestController::class,'index']);


///////////////////////////////////////RESPONCES LARAVEL////////////////////////////////////////

Route::get('/Responce',function(){
    return "hello world";//this is the HTTP Generated responces from the Browser
});

Route::get('/Responce',function(){
    return [1,2,3,4,5,6,7];//here we send the responce in the Array fromat 
});
Route::get('/homeies', function () {
    return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
});
//Eloquent Models and Collections
Route::get('/user1/{user}',function(User $user){
    return response($user);
});
//Responces with coockies 
Route::get('/cookie',function() {
    return response("Hello", 200)->header('Content-Type', 'text/html')
       ->withcookie('name','Virat Gandhi');
       
 });
 Cookie::expire('name');

 //JSON RESPONCES 
 Route::get('/fasa',function(){
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
 });

 ///////////////////////////////////////////VIEWS LARAVEL/////////////////////////////////

 Route::view('/home','welcome');

 Route::controller(ViewController::class)->group((function(){
    Route::get('/home2/{name}','view')->whereAlpha('name');
    Route::get('home3','view_two')->middleware('check');
 }
));

/////////////////////////////////////////BLADE TEMPLATES////////////////////////////

Route::get('/jason', function () {
    return view('LeaningBladeTemplates', ['name' => 'Jay siya ram']);
});

Route::get('/home',function(){
    return view('home');
});

Route::get('/rise',function(){
    return view('PhpJavscript');
});

Route::get('/deep',function(){
    return view('welcome');
});

/////////////////////////////////////////URL GENERATION ////////////////////////////


Route::get('/url',function(){
    return view('Url');
});

Route::get('/url2',function(){
    return view('url2');
});

/////////////////////////////////////////SESSION  ////////////////////////////
Route::view('login2','LoginSession');
Route::view('profile2','profile');

Route::post('login2',[Session::class,'login']);
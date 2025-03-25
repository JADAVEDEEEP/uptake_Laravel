<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    // Route::get('/role', [RollController::class, 'index'])->name('role.index');
    // Route::post('/role', [RollController::class, 'store'])->name('role.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('user.update');

    
    Route::get('/color/create', [ColorController::class, 'create'])->name('color.create');
    Route::get('/color', [ColorController::class, 'index'])->name('color.index');
    Route::post('/color', [ColorController::class, 'store'])->name('color.store');
    Route::get('/color/{id}/edit', [ColorController::class, 'edit'])->name('color.edit');
    Route::post('/color/{id}', [ColorController::class, 'update'])->name('color.update');

    
    Route::get('/size/create', [SizeController::class, 'create'])->name('size.create');
    Route::get('/size', [SizeController::class, 'index'])->name('size.index');
    Route::post('/size', [SizeController::class, 'store'])->name('size.store');
    Route::get('/size/{id}/edit', [SizeController::class, 'edit'])->name('size.edit');
    Route::post('/size/{id}', [SizeController::class, 'update'])->name('size.update');

});

require __DIR__.'/auth.php';

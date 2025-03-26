<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Models\categorie;
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
    Route::delete('/size/{id}', [SizeController::class, 'destroy'])->name('size.destroy');

    
    
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/id}', [ProductController::class, 'update'])->name('product.update');

    Route::resource('product', ProductController::class);

    
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

});

require __DIR__.'/auth.php';

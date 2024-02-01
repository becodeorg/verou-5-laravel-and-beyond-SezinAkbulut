<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HeadphonesController;
use App\Http\Controllers\SmartwatchController;
use App\Http\Controllers\SmartphoneController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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


// Home
Route::get('/', [ProductController::class, 'index'])->name('show.home');


//CRUD PRODUCTS
// Create
Route::get('/product/create', [ProductController::class, 'create'])->name('create');

// Store
Route::post('/product/store', [ProductController::class, 'store'])->name('store');
// Edit
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('edit');
// Update
Route::put('/product/{id}', [ProductController::class, 'update'])->name('update');
// Delete
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('destroy');
//Search
Route::get('/search', [ProductController::class, 'search'])->name('search');
//Show Details
Route::get('/product/{id}', [ProductController::class, 'showDetails'])->name('details');


//CATEGORIES

//HEADPHONES

Route::get('/headphones', [HeadphonesController::class, 'index'])->name('headphones.headphones');
// Create
Route::get('/headphones/create', [HeadphonesController::class, 'create'])->name('create_headphones');
// Store
Route::post('/headphones/store', [HeadphonesController::class, 'store'])->name('store_headphones');
//Show details
Route::get('/headphones/{id}', [HeadphonesController::class, 'show'])->name('headphones.show');
// Edit
Route::get('/headphones/{id}/edit', [HeadphonesController::class, 'edit'])->name('edit_headphones');
// Update
Route::put('/headphones/update/{id}', [HeadphonesController::class, 'update'])->name('update.headphones');
// Delete
Route::delete('/headphones/{id}', [HeadphonesController::class, 'destroy'])->name('destroy_headphones');

//SMARTWATCHES

Route::get('/smartwatches', [SmartwatchController::class, 'index'])->name('smartwatchs.smartwatchs');
//Show details
Route::get('/smartwatches/{id}', [SmartwatchController::class, 'show'])->name('smartwatchs.show');
// Create
Route::get('/smartwatches/create', [SmartwatchController::class, 'create'])->name('create_smartwatchs');
// Store
Route::post('/smartwatches/store', [SmartwatchController::class, 'store'])->name('store_smartwatchs');
// Edit
Route::get('/smartwatches/{id}/edit', [SmartwatchController::class, 'edit'])->name('edit_smartwatchs');
// Update
Route::put('/smartwatches/{id}', [SmartwatchController::class, 'update'])->name('update_smartwatchs');
// Delete
Route::delete('/smartwatches/{id}', [SmartwatchController::class, 'destroy'])->name('destroy_smartwatchs');

//SMARTPHONES
Route::get('/smartphones', [SmartphoneController::class, 'index'])->name('smartphones.smartphones');
//Show details
Route::get('/smartphones/{id}', [SmartphoneController::class, 'show'])->name('smartphones.show');
// Create
Route::get('/smartphones/create', [SmartphoneController::class, 'create'])->name('create_smartphones');
// Store
Route::post('/smartphones/store', [SmartphoneController::class, 'store'])->name('store_smartphones');
// Edit
Route::get('/smartphones/{id}/edit', [SmartphoneController::class, 'edit'])->name('edit_smartphones');
// Update
Route::put('/smartphones/{id}', [SmartphoneController::class, 'update'])->name('update_smartphones');
// Delete
Route::delete('/smartphones/{id}', [SmartphoneController::class, 'destroy'])->name('destroy_smartphones');

//REGISTER
Route::get("users", [UserController::class, 'index'])->name("showUsers");
Route::get("users/{id}", [UserController::class, 'show'])->name("showUser");

//USER
Route::get("/register", [RegisterController::class, 'index'])->name("showRegister");
Route::post("/register", [RegisterController::class, 'create'])->name("handleRegister");

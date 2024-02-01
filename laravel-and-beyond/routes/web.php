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

Route::get('/headphones', [HeadphonesController::class, 'index'])->name('headphones.headphones');
Route::get('/headphones/{id}', [HeadphonesController::class, 'show'])->name('headphones.show');

Route::get('/smartwatch', [SmartwatchController::class, 'index'])->name('smartwatchs.smartwatchs');
Route::get('/smartwatch/{id}', [SmartphoneController::class, 'show'])->name('smartwatchs.show');


Route::get('/smartphone', [SmartphoneController::class, 'index'])->name('smartphones.smartphones');
Route::get('/smartphone/{id}', [SmartphoneController::class, 'show'])->name('smartphones.show');

//REGISTER
Route::get("users", [UserController::class, 'index'])->name("showUsers");
Route::get("users/{id}", [UserController::class, 'show'])->name("showUser");

//USER
Route::get("/register", [RegisterController::class, 'index'])->name("showRegister");
Route::post("/register", [RegisterController::class, 'create'])->name("handleRegister");

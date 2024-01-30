<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::get('/form/create', [ProductController::class, 'create'])->name('form.create');

// Show Form
//Route::get('/form/{id}', [FormController::class, 'show'])->name('form');
// Submit Form
Route::post('/form/store', [ProductController::class, 'store'])->name('form.store');
// Edit
Route::get('/form/{id}/edit', [ProductController::class, 'edit'])->name('form.edit');
// Update
Route::put('/form/{id}', [ProductController::class, 'update'])->name('form.update');
// Delete
Route::delete('/form/{id}', [ProductController::class, 'destroy'])->name('form.destroy');
//Search
Route::get('/search', [ProductController::class, 'search'])->name('search');
//Show Details
Route::get('/movie/{id}', [ProductController::class, 'showDetails'])->name('details');


//REGISTER
Route::get("users", [UserController::class, 'index'])->name("showUsers");
Route::get("users/{id}", [UserController::class, 'show'])->name("showUser");

//Route::get("posts", [PostController::class, 'index'])->name("showPosts");
//Route::get("posts/{id}", [PostController::class, 'show'])->name("showPost");

Route::get("/register", [RegisterController::class, 'index'])->name("showRegister");
Route::post("/register", [RegisterController::class, 'create'])->name("handleRegister");

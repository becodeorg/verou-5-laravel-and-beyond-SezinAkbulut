<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

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


Route::get('/', [HomeController::class, 'index'])->name('show.home');

//Route::get('/', [ProductController::class, 'index'])->name('show.home');

Route::get('/get-random-product', [HomeController::class, 'getRandomProduct'])->name('get-random-product');
//CRUD PRODUCTS HOME PAGE
// Create
//Route::get('/product/create', [ProductController::class, 'create'])->name('create')->middleware('auth');

// Store
//Route::post('/product/store', [ProductController::class, 'store'])->name('store');
// Edit
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('edit');
// Update
Route::put('/product/{id}', [ProductController::class, 'update'])->name('update');
// Delete
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('destroy');
//Search
Route::get('/search', [ProductController::class, 'search'])->name('search')->middleware('auth');
//Show Details
Route::get('/product/{id}', [ProductController::class, 'showDetails'])->name('details');



//CATEGORIES
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); //categories pages

//CRUD CATEGORY
Route::group(['prefix' => 'categories', 'middleware' => 'auth'], function () {
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
});
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show')->middleware('auth'); //general



// PRODUCTS
Route::get('/categories/{category}/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/categories/{category}/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/categories/{category}/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/categories/{category}/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/categories/{category}/products', [ProductController::class, 'show'])->name('products.show')->middleware('auth');
Route::delete('/categories/{category}/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/categories/{category}/products/{product}', [ProductController::class, 'details'])->name('products.details');




//CART

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
Route::put('/cart/{rowId}',  [CartController::class, 'update'])->name('cart.update');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');




//REGISTER
Route::get("/users", [UserController::class, 'index'])->name("showUsers");
Route::get("/users/{id}", [UserController::class, 'show'])->name("showUser");


// LOGIN
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.show');
});

// LOGOUT
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

//USER
Route::get("/register", [RegisterController::class, 'index'])->name("showRegister");
Route::post("/register", [RegisterController::class, 'create'])->name("handleRegister");



// Add a product to the cart
//Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// Show cart and remove from cart
/*
 *
 Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/cart/show', [CartController::class, 'showCart'])->name('cart.show');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
});
 */

/*
// CART
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{category}/{productId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
*/


// Routes for managing cart items related to headphones
//Route::post('/{category}/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('category.addToCart');
//Route::get('/{category}/view-cart', [CartController::class, 'viewCart'])->name('category.viewCart');
// Add more routes for removing items, updating quantities, etc. if needed




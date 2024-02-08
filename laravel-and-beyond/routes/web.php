<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HeadphonesController;
use App\Http\Controllers\SmartwatchController;
use App\Http\Controllers\SmartphoneController;
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

//Route::get('/categories/{category}', [CategoryController::class, 'showProducts'])->name('categories.showProducts');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show')->middleware('auth'); //general


// PRODUCTS
Route::get('/categories/{category}/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/categories/{category}/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/categories/{category}/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/categories/{category}/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/categories/{category}/products', [ProductController::class, 'show'])->name('products.show')->middleware('auth');
Route::delete('/categories/{category}/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/categories/{category}/products/{product}', [ProductController::class, 'details'])->name('products.details');




//HEADPHONES

Route::get('/headphones', [HeadphonesController::class, 'index'])->name('headphones.headphones')->middleware('auth');
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



// Routes for managing cart items related to headphones
Route::post('/headphones/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('headphones.addToCart');
Route::get('/headphones/view-cart', [CartController::class, 'viewCart'])->name('headphones.viewCart');
// Add more routes for removing items, updating quantities, etc. if needed



//SMARTWATCHES

Route::get('/smartwatches', [SmartwatchController::class, 'index'])->name('smartwatchs.smartwatchs')->middleware('auth');
// Create
Route::get('/smartwatches/create', [SmartwatchController::class, 'create'])->name('create_smartwatchs');
// Store
Route::post('/smartwatches/store', [SmartwatchController::class, 'store'])->name('store_smartwatchs');
//Show details
Route::get('/smartwatches/{id}', [SmartwatchController::class, 'show'])->name('smartwatchs.show');
// Edit
Route::get('/smartwatches/{id}/edit', [SmartwatchController::class, 'edit'])->name('edit_smartwatchs');
// Update
Route::put('/smartwatches/update/{id}', [SmartwatchController::class, 'update'])->name('update_smartwatchs');
// Delete
Route::delete('/smartwatches/{id}', [SmartwatchController::class, 'destroy'])->name('destroy_smartwatchs');

// Routes for managing cart items related to other categories
Route::post('/smartwatches/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('smartwatches.addToCart');
Route::get('/smartwatches/view-cart', [CartController::class, 'viewCart'])->name('smartwatches.viewCart');


//SMARTPHONES
Route::get('/smartphones', [SmartphoneController::class, 'index'])->name('smartphones.smartphones')->middleware('auth');
// Create
Route::get('/smartphones/create', [SmartphoneController::class, 'create'])->name('create_smartphones');
// Store
Route::post('/smartphones/store', [SmartphoneController::class, 'store'])->name('store_smartphones');
//Show details
Route::get('/smartphones/{id}', [SmartphoneController::class, 'show'])->name('smartphones.show');
// Edit
Route::get('/smartphones/{id}/edit', [SmartphoneController::class, 'edit'])->name('edit_smartphones');
// Update
Route::put('/smartphones/update/{id}', [SmartphoneController::class, 'update'])->name('update_smartphones');
// Delete
Route::delete('/smartphones/{id}', [SmartphoneController::class, 'destroy'])->name('destroy_smartphones');


// Routes for managing cart items related to other categories
Route::post('/smartphones/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('smartphones.addToCart');
Route::get('/smartphones/view-cart', [CartController::class, 'viewCart'])->name('smartphones.viewCart');


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

//CART
// Display cart items
Route::get('/cart', [CartController::class, 'index'])->name('cart');

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


// CART
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{category}/{productId}', [CartController::class, 'addToCart'])->name('cart.addToCart');

// Routes for managing cart items related to headphones
//Route::post('/{category}/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('category.addToCart');
//Route::get('/{category}/view-cart', [CartController::class, 'viewCart'])->name('category.viewCart');
// Add more routes for removing items, updating quantities, etc. if needed


// Assuming you already have a route group for products
Route::prefix('products')->group(function () {
    // Headphones routes
    Route::get('/headphones/{id}/addToCart', [CartController::class, 'addToCart'])->name('addToCart.headphones');

    // Smartphones routes
    Route::get('/smartphones/{id}/addToCart', [CartController::class, 'addToCart'])->name('addToCart.smartphones');

    // Smartwatches routes
    Route::get('/smartwatches/{id}/addToCart', [CartController::class, 'addToCart'])->name('addToCart.smartwatches');
});


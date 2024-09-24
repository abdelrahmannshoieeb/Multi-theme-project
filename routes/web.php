<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
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

// Home 
Route::get('home', [HomeController::class, 'index'])->name('home');

// Category
Route::get("category/{id}", [CategoryController::class, "index"])->name("category");

// One Product
Route::get("product/{id}", [ProductController::class, "index"])->name("product");

// Cart
Route::get("cart", [CartController::class, "index"])->name("cart");

// Add To Cart - POST 

// Checkout 
Route::get("checkout", [CheckoutController::class, "index"])->name("checkout");

// Checkout - POST
// Login
Route::get("login", [AuthController::class, "viewLoginPage"])->name("login");
Route::post('/login', [AuthController::class, 'login']);
// Register
Route::get("register", [AuthController::class, "viewRegisterPage"])->name("RegisterPage");
Route::post('/register', [AuthController::class, 'register']);
// My Account 
Route::get("profile", [MyAccountController::class, "index"])->name("myaccount")->middleware('auth');
Route::post('/logout', [MyAccountController::class, 'logout'])->name('logout');
Route::get("changebranches/{id}", [BranchController::class, "changebranches"])->name("changebranches");

//Wishlist
Route::get("wishlist", [WishlistController::class, "index"])->name("wishlist")->middleware('auth');


// Route::get("Regionlivewire", [CheckoutController::class, "Regionlivewire"])->name("Regionlivewire");

Route::post('/states', [CheckoutController::class, 'getStates']);


Route::post('/sort', [CategoryController::class, 'sort']);


Route::post('/PriceRange', [CategoryController::class, 'PriceRange'])->name("PriceRange");


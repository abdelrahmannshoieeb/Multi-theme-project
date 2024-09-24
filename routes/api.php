<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\WishlistController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories' , function(){
    return Category::all();
});


//auth
Route::get('/login', [AuthController::class, 'login']); 
Route::get('/register', [AuthController::class, 'register']);

//pages
Route::get('/category/{id}', [CategoryController::class, 'index']); 
Route::get('/home', [HomeController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'index']);

//cart
Route::get('/addToCart', [CartController::class, 'addToCart']);
Route::get('/retriveCart', [CartController::class, 'retriveCart']);
Route::get('/deleteCart', [CartController::class, 'deleteCart']);

//wishlist
Route::get('/addToWishlist', [WishlistController::class, 'addToWishlist']);
Route::get('/retriveWishlist', [WishlistController::class, 'retriveWishlist']);
Route::get('/deleteWishlist', [WishlistController::class, 'deleteWishlist']);



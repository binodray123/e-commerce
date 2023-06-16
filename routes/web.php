<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Product Route
Route::get('/products',[ProductController::class, 'index'])->name('products');
Route::get('/products/view',[ProductController::class, 'view'])->name('products.view');
Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/products',[ProductController::class, 'store'])->name('products.store');
Route::get('/product/{product}/details',[ProductController::class,'detail'])->name('products.details');

// Cart Controller


Route::post('/add_to_cart/{id}',[CartController::class,'addToCart'])->name('products.addToCart');
Route::get('/cart-list',[CartController::class, 'cartList'])->name('products.cartList');
Route::delete('/cart/{id}/destroy',[CartController::class, 'destroy'])->name('carts.destroy');

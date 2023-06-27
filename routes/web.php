<?php

use App\Http\Controllers\AdminController;
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

Route::get('admin', function () {
    return view('layouts.admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Product Route
Route::get('/products',[ProductController::class, 'index'])->name('products');
Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/products',[ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/details',[ProductController::class,'detail'])->name('products.details');
Route::get('/products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{product}/destroy',[ProductController::class,'destroy'])->name('products.destroy');
// Cart Controller


Route::post('/add_to_cart/{id}',[CartController::class,'addToCart'])->name('products.addToCart');
Route::get('/cart-list',[CartController::class, 'cartList'])->name('products.cartList');
Route::get('/products/order_now',[CartController::class, 'orderNow'])->name('products.orderNow');
Route::delete('/cart/{id}/destroy',[CartController::class, 'destroy'])->name('carts.destroy');
Route::post('/products/order',[CartController::class,'orderPlace'])->name('products.order');
Route::get('/my_orders',[CartController::class, 'myOrders'])->name('myOrders')->middleware('auth');

Route::get('/admins/login',[AdminController::class, 'login'])->name('admins.login');
Route::post('/admins/login',[AdminController::class, 'adminLogin'])->name('admins.login');
Route::get('/admins/logout',[AdminController::class, 'logout'])->name('admins.logout');
Route::get('/admins/dashboard',[AdminController::class, 'index'])->name('admins.dashboard');
Route::get('/admins/{admin}/edit',[AdminController::class, 'edit'])->name('admins.edit');
Route::put('/admins/{admin}',[AdminController::class,'update'])->name('admins.update');



<?php

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
$route = 'App\Http\Controllers';

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//------------------------------------------PRODUCTS-----------------------------------------------
Route::get('/products', $route.'\ProductController@index')->name('products');
Route::get('/view/{product}', $route.'\ProductController@show')->name('product.show');


//------------------------------------------ORDERS-------------------------------------------------
Route::get('/order', $route.'\OrderController@index')->name('order.placement')->middleware('auth');
// Route::get('/order', $route.'\OrderController@calAmount')->name('order.cal')->middleware('auth');

Route::post('/order', $route.'\UserController@store')->name('user');

//------------------------------------------CART--------------------------------------------------
Route::get('/cart', $route.'\CartController@showCart')->name('cart.show')->middleware('auth');

// insert data
Route::post('/cart/insert', $route.'\CartController@add')->name('cart.add');

// delete data
Route::delete('/cart/{product}', $route.'\CartController@del')->name('cart.remove');



// if user login then go to order page else can't place order
// use ->middleware('auth')

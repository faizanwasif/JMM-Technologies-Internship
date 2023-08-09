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

Route::get('/',  $route.'\ProductController@index');

Auth::routes();

Route::get('/home',  $route.'\ProductController@index')->name('home');

//------------------------------------------PRODUCTS-----------------------------------------------
Route::get('/products', $route.'\ProductController@index')->name('products');

Route::get('/view/{product}', $route.'\ProductController@show')->name('product.show');


//------------------------------------------ORDERS-------------------------------------------------
Route::get('/order', $route.'\OrderController@index')->name('order.placement')->middleware('auth');

Route::post('/order', $route.'\OrderController@insert')->name('order.insert')->middleware('auth');


//------------------------------------------CART--------------------------------------------------
Route::get('/cart', $route.'\CartController@showCart')->name('cart.show')->middleware('auth');

// insert data
Route::post('/cart/insert', $route.'\CartController@add')->name('cart.add')->middleware('auth');

// delete data
Route::delete('/cart/{product}', $route.'\CartController@del')->name('cart.remove')->middleware('auth');



//-----------------------------------------Order Item----------------------------------------------
Route::post('/items', $route.'\OrderItemController@insert')->name('item.insert')->middleware('auth');


//-----------------------------------------Category------------------------------------------------
Route::get('/categories', $route.'\CategoryController@index')->name('category.view');
Route::get('/categories/{category}', $route.'\CategoryController@show')->name('category.show');


// if user login then go to order page else can't place order
// use ->middleware('auth')

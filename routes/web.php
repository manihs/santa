<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');

// Guest Controller

Route::get('/category/{name}', 'GuestController@index')->name('index.GuestController');

Route::get('/', 'GuestController@land')->name('land');

// Crud Products -------------------------------------------------------

Route::get('/product', 'ProductController@index')->name('product')->middleware('auth');

Route::get('/product/add', 'ProductController@create')->name('create.product')->middleware('auth');

Route::post('/product/add', 'ProductController@store')->name('upload.product')->middleware('auth');

Route::get('/product/view/{id}', 'ProductController@show')->name('show.product');

Route::get('/product/edit/{id}', 'ProductController@edit')->name('edit.product')->middleware('auth');

Route::post('/product/edit', 'ProductController@update')->name('update.product')->middleware('auth');

Route::get('/product/delete/{id}', 'ProductController@destroy')->name('destroy.product')->middleware('auth');


//  Crud Inventory  ----------------------------------------------------

Route::get('/update/inventory', 'InventoryController@index');

// Orders --------------------------------------------------------------

Route::get('/order', 'OrderController@index')->name('order')->middleware('auth');;

Route::get('/order/new/{id}', 'OrderController@create')->name('create.order');

Route::post('/add/order', 'OrderController@store')->name('store.order');

Route::get('/view/order/{id}', 'OrderController@show')->name('view.order');
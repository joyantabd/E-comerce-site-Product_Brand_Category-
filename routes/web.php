<?php

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

Route::get('/','HomeController@index')->name('index');

Auth::routes();


Route::group(['prefix'=>'admin','namespace'=>'admin'],function() {

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('product','ProductsController');
    Route::resource('brand','BrandsController');
    Route::resource('category','CategoryController');
    Route::resource('varient','VarientController');

    Route::get('/edit1/{id}', 'ProductsController@edit1')->name('product.edit1');


});
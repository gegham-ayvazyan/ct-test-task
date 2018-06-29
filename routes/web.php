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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'product'], function() {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('/', 'ProductController@store')->name('product.store');
    Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::put('{id}', 'ProductController@update')->name('product.update');
    Route::get('{id}', 'ProductController@show')->name('product.show');
    Route::delete('{id}', 'ProductController@destroy')->name('product.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

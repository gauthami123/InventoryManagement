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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

	
	Route::group(['middleware' => ['admin']], function () {
    Route::get('admin-view', 'AdminController@admin')->name('admin.view');
	Route::get('productlist', 'ProductController@index');
	Route::get('create_product', 'ProductController@create_product');
	Route::post('create', 'ProductController@create');
	Route::get('edit/{id}', 'ProductController@edit');
	Route::POST('update/{id}', 'ProductController@update');
	Route::delete('delete/{id}', 'ProductController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

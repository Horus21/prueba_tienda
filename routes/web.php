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


Auth::routes();

Route::get('/', 'OrdersController@index')->name('newOrder');

Route::get('listOrder', 'OrdersController@list')->name('list');

Route::get('resumeOrder/{id}', 'OrdersController@show')->name('show');

Route::post('/','OrdersController@create')->name('create');

Route::get('edit/{id}', 'OrdersController@edit')->name('edit');

Route::put('edit/{id}', 'OrdersController@update')->name('update');

Route::delete('destroy/{id}','OrdersController@destroy')->name('destroy');

Route::get('newOrder/{id}','JsonController@jsonorder')->name('jsonorder');


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

Route::get('/', 'WeatherController@index')->name('index');
Route::get('/orders', 'OrdersController@index')->name('orders_list');
Route::get('/orders/edit/{id}', 'OrdersController@edit')->name('orders_edit');
Route::post('/orders/update/{order}', 'OrdersController@update')->name('orders_update');

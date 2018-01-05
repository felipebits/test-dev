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
Route::get('/','CarController@index');

Route::get('/cars', 'CarController@index');
Route::get('api/brands', 'CarController@getBrands');
Route::get('api/cars', 'CarController@getCars');
Route::put('api/cars/{id}', 'CarController@update');
Route::get('api/cars/{id}', 'CarController@getCar');
Route::post('api/cars', 'CarController@store');




Route::delete('api/cars/{id}', 'CarController@destroy');

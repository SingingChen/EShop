<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('post', 'HomeController@index');
Route::get('post/create', 'HomeController@create');
Route::post('post', 'HomeController@store');
Route::get('post/{id}', 'HomeController@show');

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

Route::resource('post' ,'HomeController');

//用group群組化管理
//Route::group(['prefix'=>'post'],function (){
//    Route::get('/', 'HomeController@index');
//    Route::get('create', 'HomeController@create');
//    Route::post('/', 'HomeController@store');
//    Route::get('{id}', 'HomeController@show');
//    Route::get('{id}/edit', 'HomeController@edit');
//    Route::put('{id}', 'HomeController@update');//put ::  你會看到這個 route 是 put 並且網址為 post/{id}，這就是為什麼表單 url 及 method 要修改的理由。
//    Route::delete('{id}' , 'HomeController@destroy');

//});
//Route::get('post', 'HomeController@index');
//Route::get('post/create', 'HomeController@create');
//Route::post('post', 'HomeController@store');
//Route::get('post/{id}', 'HomeController@show');
//Route::get('post/{id}/edit', 'HomeController@edit');
//Route::put('post/{id}', 'HomeController@update');//put ::  你會看到這個 route 是 put 並且網址為 post/{id}，這就是為什麼表單 url 及 method 要修改的理由。
//Route::delete('post/{id}' , 'HomeController@destroy');
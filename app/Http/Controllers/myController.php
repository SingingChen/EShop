<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class myController extends Controller
{
    //
	Route::get('/', myController@index);
	Route::get('/contact_us', myController@contact_us);
	Route::get('/login', myController@login);
	Route::get('/logout', myController@logout);
	Route::get('/products', myController@products);
	Route::get('/products/category', myController@products_category);
	Route::get('/products/brands', myController@products_brands);
	Route::get('/products/details/{id}', myController@products_detail);
	Route::get('/blog', myController@blog);
	Route::get('/blog/post/{id}', myController@blog_post);
	Route::get('/search/{key_word}', myController@search);
	Route::get('/cart', myController@cart);
	Route::get('/chechout', myController@chechout);



}

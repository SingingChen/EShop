
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', "myController@index");

Route::get('/contact_us', "myController@contact_us");

Route::get('/login', "myController@login");

Route::get('/logout', "myController@logout");

Route::get('/products', "myController@products");

Route::get('/products/category', "myController@products_category");

Route::get('/products/brands', "myController@products_brands");

Route::get('/products/details/{id}', "myController@products_details");

Route::get('/blog', "myController@blog");

Route::get('/blog/post/{i}', "myController@blog_post");

Route::get('/search/{key_word}', "myController@search");

Route::get('/cart', "myController@cart");

Route::post('/cart', "myController@cart");

Route::get('/checkout', "myController@checkout");

Route::post('/cart/add', "myController@cart_add");

Route::get('/test/write', function (){
    $product = new \App\Product();
//    $product->name = '345test';
//    $product->title = "ehryjt";
//    $product->description = "test";
//    $product->price = 1245;
//    $product->category_id =2;
//    $product->brand_id = 3;
//    $product->created_at_ip = "";
//    $product->updated_at_ip = "";
//    $product->save();

    $product->create(["name"=>'66333test' , "title"=>"fytfjyf" ,"price"=>234]);

    return redirect('/test/read');
});
//ok
Route::get('/test/read' ,function(){
   $product =  new \App\Product();

$product_datas = $product->all(['id' ,'name', 'price']);
    foreach ($product_datas as $product_data)
    {
        echo "$product_data->id , $product_data->name ,$product_data->price <br>";
    }
});
//ok
Route::get('/test/update/{id}' , function ($id){
    $product = \App\Product::find($id);
    $product->price = 346;
    $product->description = "sghoeur";

    $product->save();
    
    return redirect("/test/read");
});
//ok
Route::get('/test/delete/{id}' ,function($id){
    $product = \App\Product::find($id);
    $product->delete();
    return redirect("/test/read");
    
});



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class myController extends Controller
{
    var $products;
    var $categories;
    var  $brands;

    public function __construct()
    {
        $this->products = \App\Product::all(["id","name","price"]);
        $this->categories =\App\Category::all(["name"]);
        $this->brands =\App\Brand::all(["name"]);
        }

    public function index()
    {
//        $product = new \App\Product();
//        $product->name = "testhello~~ 從 Controller 12345";
//        $product->save();
        return view("home", ["title" => "Home","producta"=>$this->products, "categories"=>$this->categories, "brands"=>$this->brands]);
    }


    public function contact_us()
    {
     return view("contact_us", ["title" => "Contact Us"]);
    }

    public function login()
    {
        return view("login", ["title" => "Login"]);

    }

    public function logout()
    {
        return view("logout");
    }

    public function products()
    {
        return view("products", ["title" => "Products" ,"products"=>$this->products, "categories"=>$this->categories , "brands"=>$this->brands]);

    }

    public function products_category()
    {
        return view("products_category");
    }

    public function products_brands()
    {
        return view("products_brands");
    }

    public function products_details($id)
    {
        return view("products_details",['title'=>'Products Details','i'=>$id]);
     
    }

    public function blog()
    {
        return view("blog", ["title" => "Blog", "products" => $this->products, "categories" => $this->categories, "brands" => $this->brands]);

    }

    public function blog_post($i)
    {
        return view("blog_post", ["title" => "Blog", "i" => $i]);

    }

    public function search($key_word)
    {
        return "搜尋:$key_word";
    }

    public function cart()
    {
        return view("cart",['title' =>'Cart']);
    }

    public function checkout()
    {
        return view("checkout", ["title" => "Checkout"]);
    }


}

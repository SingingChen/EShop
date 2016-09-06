<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class myController extends Controller
{
    //
  public function index()
    {
        return view("home");
    }

    public function contact_us()
    {
        return view("contact_us");
    }

    public function login()
    {
        return view("login");
    }

    public function logout()
    {
        return view("logout");
    }

    public function products()
    {
        return view('products');
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
        return "產品介紹:$id";
    }

    public function blog()
    {
        return view("blog");
    }

    public function blog_post()
    {
        return view("blog_post");
    }

    public function search($key_word)
    {
        return "搜尋:$key_word";
    }

    public function cart()
    {
        return view("cart");
    }

    public function checkout()
    {
        return view("checkout");
    }


}

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
        return "聯絡我們";
    }

    public function login()
    {
        return "登入";
    }

    public function logout()
    {
        return "登出";
    }

    public function products()
    {
        return view('products');
    }

    public function products_category()
    {
        return "產品目錄";
    }

    public function products_brands()
    {
        return "產品品牌";
    }

    public function products_details($id)
    {
        return "產品介紹:$id";
    }

    public function blog()
    {
        return "文章列表";
    }

    public function blog_post($i)
    {
        return "文章:$i";
    }

    public function search($key_word)
    {
        return "搜尋:$key_word";
    }

    public function cart()
    {
        return "購物車";
    }

    public function checkout()
    {
        return "結帳";
    }


}

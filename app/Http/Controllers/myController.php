<?php

namespace App\Http\Controllers;


use Redirect;
use App\Http\Requests;
use Request;
use Cart;


class myController extends Controller
{
    var $products;
    var $categories;
    var $brands;

    public function __construct()
    {
        $this->products = \App\Product::all(["id", "name", "price"]);
        $this->categories = \App\Category::all(["name"]);
        $this->brands = \App\Brand::all(["name"]);
    }

    public function index()
    {
//        $product = new \App\Product();
//        $product->name = "testhello~~ 從 Controller 12345";
//        $product->save();

        return view("home", ["title" => "Home", "description" => "網頁說明", "products" => $this->products, "categories" => $this->categories, "brands" => $this->brands]);

    }


    public function contact_us()
    {
        return view("contact_us", ["title" => "Contact Us", "description" => "網頁說明"]);
    }

    public function login()
    {
        return view("login", ["title" => "Login", "description" => "網頁說明"]);

    }

    public function logout()
    {
        return view("logout");
    }

    public function products()
    {
        return view("products", ["title" => "Products", "description" => "網頁說明", "products" => $this->products, "categories" => $this->categories, "brands" => $this->brands]);

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
        return view("products_details", ['title' => 'Products Details', "description" => "網頁說明", 'i' => $id, "products" => $this->products, "categories" => $this->categories, "brands" => $this->brands]);

    }

    public function blog()
    {
        return view("blog", ["title" => "Blog", "products" => $this->products, "description" => "網頁說明", "categories" => $this->categories, "brands" => $this->brands]);

    }

    public function blog_post($i)
    {
        return view("blog_post", ["title" => "Blog", "description" => "網頁說明", "i" => $i]);

    }

    public function search($key_word)
    {
        return "搜尋:$key_word";
    }

    public function cart()
    {
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = \App\Product::find($product_id);

            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
        }

        if (Request::get("product_id") && (Request::get("add") == 1)) {
            $items = Cart::Search(function ($carItem, $rowId) {
                return $carItem->id == Request::get("product_id");
            });
            Cart::update($items->first()->rowId, $items->first()->qty + 1);
//            echo $items;
        }
        if (Request::get("product_id") && (Request::get("minus") == 1)) {
            $items = Cart::Search(function ($carItem, $rowId) {
                return $carItem->id == Request::get("product_id");
            });
            Cart::update($items->first()->rowId, $items->first()->qty - 1);
        }
        if (Request::get("product_id") && (Request::get("clear") == 1)) {
            $items = Cart::Search(function ($carItem, $rowId) {
//                foreach ($carItem as $value){
//                    //$carItem 為購物車裡所有項目
//                    echo "$value<br>";
//                }

                return $carItem->id == Request::get("product_id");
            });

            //$items為搜尋出來要刪除的那一項
//            echo "$items<br>";

            Cart::remove($items->first()->rowId);

        }
        $cart = Cart::content();
        return view("cart", ["title" => "Cart", "description" => "網頁說明", "cart" => $cart]);

    }

    public function cart_add()
    {
        $product_id = Request::get("product_id");
        $product = \App\Product::find($product_id);

        Cart::add(["id" => $product_id,
            "name" => $product->name,
            "qty" => 1,
            "price" => $product->price]);
        return redirect("cart")->with(["title" => "Cart", "description" => "網頁說明"]);
    }

    public function clear_cart()
    {
        Cart::destroy();
        return redirect("cart")->with(["title" => "Cart", "description" => "網頁說明"]);
    }

    public function checkout()
    {
        return view("checkout", ["title" => "Checkout", "description" => "網頁說明"]);
    }


}

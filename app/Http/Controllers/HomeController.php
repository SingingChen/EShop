<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016/8/30
 * Time: 下午 12:53
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function show($id)
    {
        return View::make(' home')
            ->with('title','首頁')
            ->with('hello','大家好'.$id);
    }
    public function index()
    {
        return View(' home')
            ->with('title','首頁')
            ->with('hello','大家好');

    }
    public function store()
    {
        $input = Input::all();
        return $input['title'];
    }

}
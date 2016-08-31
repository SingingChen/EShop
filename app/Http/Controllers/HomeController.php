<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016/8/30
 * Time: 下午 12:53
 */

namespace App\Http\Controllers;
use App\Post;
use DB;
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
        $posts = Post::all();
        return View(' home')
            ->with('title','My Blog')
            ->with('posts',$posts);

    }
    public function store()
    {
        $input = Input::all();
        return $input['title'];
    }

}
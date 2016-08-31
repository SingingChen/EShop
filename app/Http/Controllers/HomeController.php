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
use Request;
use URL;

class HomeController extends Controller
{
    public function show($id)
    {
     $post =Post::find($id);
        return View::make('show')
            ->with('title' , 'My Blog -'.$post->title)
            ->with('post' ,$post);
    }
    public function index()
    {
        $posts = Post::all();
        return View(' home')
            ->with('title','My Blog')
            ->with('posts',$posts);

    }
    public function create()
    {
        return View::make('create')
            ->with('title','新增文章');
    }
    public function store()
    {
        $input = Request::all();
        $post = new Post;
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->save();
        
        return Redirect('post');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return View::make('edit')
            ->with('title','編輯文章')
            ->with('post' ,$post );
    }

}
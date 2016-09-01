<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016/8/30
 * Time: 下午 12:53
 */

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Html;

class HomeController extends Controller
{
    public function show($id)
    {
     $post =Post::find($id);
        return View::make('site.show')
            ->with('title' , 'My Blog -'.$post->title)
            ->with('post' ,$post);
    }
    public function index()
    {
        $posts = Post::all();
        return View(' site.home')
            ->with('title','My Blog')
            ->with('posts',$posts);

    }
    public function create()
    {
        return View::make('site.create')
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
        return View::make('site.edit')
            ->with('title','編輯文章')
            ->with('post' ,$post );
    }
    public function update($id)
    {
        $input = Request::all();

        $post =Post::find($id);
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->save();

        return Redirect('post');
    }
public function destroy($id)
{
    $post = Post::find($id);
    $post->delete();
    return Redirect('post');
}
}
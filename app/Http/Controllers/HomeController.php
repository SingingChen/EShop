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
use Redirect;
use View;
use Request;
use URL;
use Html;
use Validator;
use App\SocialiteUserService;
use App;
use Lang;

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
        App::setLocale('tw');
        $title = Lang::get('default.title');

        $posts = Post::paginate(3);
        return View(' site.home')
            ->with('title',$title)
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
//       處理資料驗證。使用 Validator 類別的 make() 方法來建立驗證：
//        Validator::make(data, rules, messages, customAttributes)
//        參數說明：
//        data：陣列。是準備要驗證的資料。
//        rules：陣列。驗證規則。
//        messages：陣列。驗證失敗後要回傳的訊息。
//        除了 data 及 rules，後面的兩個參數都可省略。
        $rules = ['title'=>'required| min:5'];
        $messages = ['required'=>'! title不可空白' , 'min'=>'最少為5個字'];
        $validator = Validator::make($input , $rules ,$messages);
        if($validator->passes()){
            $post = new Post;
            $post->title = $input['title'];
            $post->content = $input['content'];
            $post->save();

            return Redirect('post');
        }

        return Redirect('post/create')
            ->withInput()  //withInput() 會同時把使用者有輸入資料的欄位的值回傳,如不寫這行  驗證錯誤重新倒回資料將不在寫回必須重新輸入
            ->withErrors($validator);

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
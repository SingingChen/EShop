@extends('site.layouts.default')
@section('sidebar')
   Homepage OH!!
    @stop


@section('content')
    <h1>{{$title}}</h1>
    <div>{{Html::link('post/create','新增')}}</div>
      {{--{!!' <h1>測試</h1>'!!}--}}
    @if(isset($posts))
        <ol>
            @foreach($posts as $post)
                <li>{{Html::link('post/'.$post->id,$post->title)}}
                    ({{Html::link('post/'.$post->id.'/edit' , '編輯')}})
                </li>
            @endforeach

        </ol>

    @endif

    @if(Auth::check())
    {{ Auth::user()->username}} 已登入，{{ HTML::link('logout', '登出') }}
    @endif


@stop

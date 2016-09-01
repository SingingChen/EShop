@extends('site.layouts.default')

        @section('content')
            @if(isset($post))
                <h1>{{$post->title}}</h1>
                <p>{{$post->content }}</p>
            @endif

            {{Html::link(URL::previous(), '回上一頁')}}
        @stop

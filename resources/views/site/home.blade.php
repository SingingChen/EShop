@extends('site.layouts.default')

@section('content')
    <h1>{{$title}}</h1>
    <div>{{Html::link('post/create','新增')}}</div>
    @if(isset($posts))
        <ol>
            @foreach($posts as $post)
                <li>{{Html::link('post/'.$post->id,$post->title)}}
                    ({{Html::link('post/'.$post->id.'/edit' , '編輯')}})
                </li>
            @endforeach

        </ol>

    @endif
@stop

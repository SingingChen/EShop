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

    {{ Form::checkbox('habit', 'reading', true) }}看書<br>
    <hr>

    {{ Form::radio('city', 'taipei', true) }}Taipei<br>
    {{ Form::radio('city', 'taichung') }}Taichung<br>
    {{ Form::radio('city', 'kaohsiung') }}Kaohsiung<br>
    <hr>

    {{ Form::select('size', ['L'=>'大','M'=>'中','S'=>'小'], 'M') }}
    <hr>

    {{ Form::select('fruit', [
    'A' => ['apple' => 'Apple'],
    'B' => ['banana' => 'Banana'],
])}}
    <hr>

    {{ Form::selectRange('number', 10, 20) }}
    <hr>
    {{ Form::selectMonth('month') }}
    <hr>
@stop

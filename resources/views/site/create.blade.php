@extends('site.layouts.default')

        @section('content')
            <h1>{{$title}}</h1>
            {{Form::open(['url'=>'post' , 'method'=>'post'])}}
            {{Form::label('title','標題')}}<br>
            {{Form::text('title')}}<br>
            {{Form::label('content','內容')}}<br>
            {{Form::textarea('content')}}<br>
            {{Form::submit('發表文章')}}
            {{Form::close()}}

        @stop

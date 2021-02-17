@extends('public/base')

@section('title', '首页')

@section('main')
    <p>内容</p>
@endsection

@section('sidebar')
    @parent
    <a href="#">首页</a>
@endsection


<br>

{{$name}} {!! $name !!}

@json($list, JSON_PRETTY_PRINT)

@@{{$name}}

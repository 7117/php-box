<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

User:{{$name}}

<?php echo 'Blade'.(1+1)?>

<br>
<br>


@if ($num > 10)
    num大于10
@elseif ($num > 5)
    num大于5
@else
    num小于5
@endif

@unless($num > 5)
    num小于5
@endunless

@isset($num)
    num存在
@endisset


@switch($num)
    @case(1)
        1
        @break
    @case(4)
        4
        @break
    @default
        不存在
@endswitch

<br>
<br>


@for ($i = 0; $i <= 10; $i++)
    {{$i}} --
@endfor

<br>
<br>

@foreach ($obj as $user)
    {{$user->username}} --
@endforeach

<br>
<br>

@foreach ($obj as $user)
    @if ($user->username == '樱桃小丸子')
        @continue
    @endif
    {{$user->username}} --
@endforeach

<br>
<br>

@foreach ($obj as $user)
    @if ($user->username == '樱桃小丸子')
        @break
    @endif
    {{$user->username}} --
@endforeach


<br>
<br>


{{--这个是循环--}}
@foreach ($obj as $user)
    @if ($loop->first)
        [起始数据之前]
    @endif

    @if ($loop->last)
        [末尾数据之前]
    @endif


    {{$user->username}} --
@endforeach

@php
    echo 1+1
@endphp


</body>
</html>

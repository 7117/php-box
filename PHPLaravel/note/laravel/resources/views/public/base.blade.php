<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}} -- @yield('title', 'no title')</title>
</head>
<body>

Base

@section('sidebar')
    <ol>
        <li><a href="#">导航</a></li>
    </ol>
@show

<div class="container">
    @yield('main')
</div>



</body>
</html>

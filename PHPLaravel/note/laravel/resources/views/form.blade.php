<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>提交</title>
</head>
<body>

{{--<form action="/task/getform" method="post">--}}
{{--    <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
{{--    <input type="hidden" name="_method" value="put">--}}
{{--    @csrf--}}
{{--    @method('put')--}}
{{--    <button type="submit">提交</button>--}}
{{--</form>--}}

@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

{{--@error('username')--}}
{{--    <div>{{$message}} : 用户名非法！</div>--}}
{{--@enderror--}}


<form action="/task/receive" method="post">
    @csrf
    用户名：<input type="text" name="username" value="{{old('username')}}">
    密码：<input type="password" name="password">
    密码确认：<input type="password" name="password_confirmation">
    <button type="submit">提交</button>
</form>





</body>
</html>

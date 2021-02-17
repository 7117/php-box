<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>模型</title>
</head>
<body>


<table border="1">
    <tr>
        <th>ID</th>
        <th>用户名</th>
        <th>性别</th>
        <th>邮箱</th>
    </tr>
    @foreach($list as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->gender}}</td>
        <td>{{$user->email}}</td>
    </tr>
    @endforeach
</table>

{{--{{$list->withPath('/users/list')->links()}}--}}
{{--{{$list->appends(['sort'=>'id'])->withQueryString()->fragment('element')->links()}}--}}
{{$list->onEachSide(2)->links()}}


</body>
</html>

<?php
//别的页面进行cookie验证登录态
include "conn.php";

$url=$_SERVER['PHP_SELF'];

$allowulr=[
    "/PHPSessionControl/login/login.php"
];

if(in_array($url,$allowulr)){
    exit("<script>
        alert('可以的');
        window.location.href='login.php';
    </script>");
}

//获取cookie
$cookieuser=$_COOKIE['username'];
$cookieauth=$_COOKIE['auth'];
//没有cookie没有登录  去登录
if(!isset($cookieauth) || !isset($cookieuser)){
    exit("<script>
        alert('没有登录啊');
        window.location.href='login.php';
    </script>");
}

//已经存在cookie了的
$auth=explode(":",$cookieauth);
$id=$auth[1];
$sql="select * from cookie where id='{$id}'";
$res=mysqli_query($link,$sql);
//存在此用户
if(mysqli_num_rows($res)){
    $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
    $username=$row[0]['username'];
    $password=$row[0]['password'];
    $salt="aaa";
    $authsql=md5($username.$password.$salt).':'.$row[0]['id'];
    //验证失败
    if($authsql!==$cookieauth){
        exit("验证失败了");
    //验证成功
    }else{
        var_dump("<script>
            alert('其他页面验证成功了');
        </script>");
    }
//没有此用户
}else{
    exit("没有查找到啊");
}
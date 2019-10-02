<?php
include "conn.php";
//没有cookie
$cookieuser=$_COOKIE['username'];
$cookieauth=$_COOKIE['auth'];
if(!isset($cookieauth) || !isset($cookieuser)){
    exit("validate fail");
}
//有cookie
$auth=explode(":",$cookieauth);
$id=$auth[1];
$sql="select * from cookie where id='{$id}'";
$res=mysqli_query($link,$sql);
if(mysqli_num_rows($res)){
    $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
    $username=$row[0]['username'];
    $password=$row[0]['password'];
    $salt="aaa";
    $authsql=md5($username.$password.$salt).':'.$row[0]['id'];
    if($authsql!==$cookieauth){
        exit("验证失败了");
    }else{
        exit("验证成功");
    }
}else{
    exit("没有查找到啊");
}
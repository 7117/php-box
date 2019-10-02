<?php
include "conn.php";
$username=$_POST['username'];
$password=$_POST['password'];
$autologin=$_POST['autoLogin']?$_POST['autoLogin']:1;

$sql="select id,username,password from cookie where username='{$username}'";

$result=mysqli_query($link,$sql);
if(!empty(mysqli_num_rows($result))){
    if($autologin){
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
        setcookie('username',$username,time()+7*24*3600);
        $salt="aaa";
        $auth=md5($username.$password.$salt).':'.$row[0]['id'];
        setcookie('auth',$auth,time()+7*24*3600);
    }else{
        setcookie('username',$username);
    }
    exit("<script>
        alert('success');
        window.location.href='index.php';
    </script>");
}else{
    exit("<script>
        alert('fail');
        window.location.href='login.php';
    </script>");
}

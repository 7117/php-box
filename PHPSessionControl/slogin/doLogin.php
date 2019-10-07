<?php
//在登录的表单进行登录的验证并且进行保存cookie
session_start();
include "conn.php";
$username=$_POST['username'];
$password=$_POST['password'];
$verify=$_POST['verify'];
$act=$_GET['act'];
$sverify=$_SESSION['verify'];


if($act!=='login'){
    $_SESSION=[];
    if(ini_get("session.use_cookies")){
        $para=session_get_cookie_params();

        setcookie(session_name(),'',time()-1,$para['path'],$para['domain'],$para['secure'],$para['httponly']);
    }
    session_destroy();
    exit("<script>
        alert('dologin');
        window.location.href='login.php';
    </script>");
}



$sql="select id,username,password from cookie where username='{$username}'";

$result=mysqli_query($link,$sql);
if(!empty(mysqli_num_rows($result))){
    //存在的话  进行跳转
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $_SESSION['username']=$row[0]['username'];
    $_SESSION['isLogin']=true;
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

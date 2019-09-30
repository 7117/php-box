<?php

header("CONTENT-TYPE:text/html;charset=UTF-8");
define("HOST","127.0.0.1");
define("USERNAME","root");
define("PASSWORD","root");
define("DB","onecms");

if($con=new mysqli(HOST,USERNAME,PASSWORD,DB)){
    echo $con->error;
}
if($con->select_db("onecms")){
    echo $con->error;
}
if($con->query("SET NAMES utf8")){
    echo $con->error;
}

$id=$_POST["id"];
$title=$_POST["title"];
$author=$_POST["author"];
$message=$_POST["message"];
$time=date('y-m-d h:m:s');

$sql="insert into board(id,title,author,message,dateline) values('$id','$title','$author','$message','$time')";

if($str=$con->query($sql)){
    echo "<script>alert('留言成功');window.location.href='success.php'</script>";
}
else {
    echo "<script>alert('留言失败');window.location.href='fail.php'</script>";
}
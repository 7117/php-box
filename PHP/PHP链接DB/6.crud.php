<?php
include "conn.php";

mysqli_select_db($conn,"user");

$sql="update user set name='aaa' where id=1";
$res=mysqli_query($conn,$sql);
var_dump($res);


$sql="select * from user order by id desc";
$res=mysqli_query($conn,$sql);
$res=mysqli_fetch_ALL($res,MYSQLI_ASSOC);
var_dump($res);


$sql="insert into user values (22,'qq','dddd')";
$res=mysqli_query($conn,$sql);
var_dump($res);

$sql="delete from user where id=22";
$res=mysqli_query($conn,$sql);
var_dump($res);

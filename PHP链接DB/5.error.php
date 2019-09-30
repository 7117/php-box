<?php
define("host","localhost");
define("user","root");
define("pwd","root");
define("db","mydb");
define("port",3306);

$conn=new mysqli("a",user,pwd,db,port);
//报错了哈  找不到地址 addressinfo！！！！！
mysqli_error();


<?php
define("host","localhost");
define("user","root");
define("pwd","root");
define("db","mydb");
define("port",3306);

$conn=new mysqli(host,user,pwd,db,port);
// $conn=mysqli_connect(host,user,pwd,db,port);
$sql="select * from user";
$res=$conn->query($sql);
$res=mysqli_fetch_all($res,MYSQLI_NUM);

foreach($res as $k=>$v){
    var_dump($v);
    echo "<br>";
}

mysqli_close($conn);



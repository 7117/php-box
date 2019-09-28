<?php
include "conn.php";

$sql="select * from user";
$res=$conn->query($sql);
$res1=mysqli_fetch_all($res,MYSQLI_NUM);
$res=$conn->query($sql);
$res2=mysqli_fetch_all($res,MYSQLI_ASSOC);

echo "<br>";
var_dump($res1);
foreach($res1 as $k=>$v){
    // var_dump($v);
    echo "<br>";
}

echo "<br>";
var_dump($res2);
foreach($res2 as $k=>$v){
    // var_dump($v);
    echo "<br>";
}


mysqli_close($conn);



<?php
include "conn.php";

$sql="select * from user";
$res=$conn->query($sql);
$res=mysqli_fetch_all($res,MYSQLI_NUM);

foreach($res as $k=>$v){
    var_dump($v);
    echo "<br>";
}

mysqli_close($conn);



<?php
include "conn.php";

mysqli_select_db($conn,"aa");
$sql="insert into aa values(null,'aa','aaaa')";

try{
    throw new Exception($conn->query($sql));
}catch (Exception $e){

    echo $e->getMessage();
}
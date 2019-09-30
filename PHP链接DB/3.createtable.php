<?php
include "conn.php";

mysqli_select_db($conn,"aa");
$sql="
create table aa(
id int(11) primary key,
name varchar(11) default '',
sex varchar(11) default ''
);
";

try{
    throw new Exception($conn->query($sql));
}catch (Exception $e){

    echo $e->getMessage();
}
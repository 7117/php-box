<?php
/**
 * Created by PhpStorm.
 * User: sunxi
 * Date: 2019/9/23
 * Time: 23:20
 */
$conn=new mysqli("localhost","root","root","onecms");
$sql="select * from btest";
$res=$conn->query($sql);
$res=mysqli_fetch_all($res,MYSQLI_NUM);
$data=[];
foreach($res as $k=>$v){
    $data[$k]=$v;
}
echo "<pre>";
print_r($data);
echo "</pre>";
<?php
include 'mysqli.php';
$num=$_GET["num"];//每页显示的个数
$sql="select * from message";
$result=$mysqli->query($sql);
$totalnum=$result->num_rows;//总记录数
$totalpage=ceil($totalnum/$num);//总页数
echo $totalpage;
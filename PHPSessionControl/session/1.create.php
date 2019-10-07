<?php
header('content-type:text/html;charset=utf-8');
session_start();

$_SESSION['aa']='aa';
$_SESSION['bb']='bb';


echo "序号"."<br>";
echo session_id();
echo "<br>";
echo "名字"."<br>";
echo session_name();
echo "<br>";
echo "内容";
echo "<br>";
print_r($_SESSION);
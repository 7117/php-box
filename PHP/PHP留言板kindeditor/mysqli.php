<?php
include 'conn.inc.php';
include './web/mysqli.php';

$mysqli=new mysqli(HOST,USER,PWD,DBNAME);
if($mysqli->connect){
    die('数据库链接出错'.$mysqli->connect_error);
}else{
	die('正确');
}
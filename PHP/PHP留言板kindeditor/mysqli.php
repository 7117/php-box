<?php
include 'conn.inc.php';
include 'mysqlifunc.php';

$mysqli=new mysqlifunc(HOST,USER,PWD,CHARSET,DBNAME);

if($info=$mysqli->connect(HOST,USER,PWD,CHARSET,DBNAME)){
    var_dump($info);
    die('数据库链接出错');
}else{
	die('正确');
}

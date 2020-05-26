<?php

$reg = '/[a-z]/';
$str = 'dfeffecsxc';

preg_match($reg, $str, $con);

var_dump($con);


// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\9.[a-z].php:8:
// array (size=1)
//   0 => string 'd' (length=1)
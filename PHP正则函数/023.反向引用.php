<?php

$reg = '/(.)\1/u';
$str = 'isswcwcscscscdsis';
preg_match($reg, $str, $con);
var_dump($con);


// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\023.反向引用.php:6:
// array (size=2)
//   0 => string 'ss' (length=2)
//   1 => string 's' (length=1)
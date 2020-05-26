<?php


$reg = '/.*/';


$str = '我按你中国啊啊啊啊';


preg_match($reg, $str, $con);


var_dump($con);

//
//
// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\012.量词.php:13:
// array (size=1)
//   0 => string '我按你中国啊啊啊啊' (length=27)
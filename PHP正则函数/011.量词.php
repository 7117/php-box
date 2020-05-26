<?php


$reg = '/[\x{4e00}-\x{9fa5}]{3}/u';


$str = '我按你中国啊啊啊啊';


preg_match($reg, $str, $con);


var_dump($con);



// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\011.量词.php:13:
// array (size=1)
//   0 => string '我按你' (length=9)
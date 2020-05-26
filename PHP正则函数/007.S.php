<?php

$reg="/\S/";
$str="sss ddd fff";
preg_match($reg,$str,$aa);
var_dump($aa);


// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP正则函数\7.S.php:6:
// array (size=1)
//   0 => string 's' (length=1)
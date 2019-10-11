<?php

$reg="/\s/";
$str="sss ddd fff";
preg_match($reg,$str,$aa);
var_dump($aa);

// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP正则函数\6.s.php:6:
// array (size=1)
//   0 => string ' ' (length=1)
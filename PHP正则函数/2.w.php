<?php

//\w字符数字下划线中的一个
$reg='/\w/';
$str='_aaawhat';
preg_match($reg,$str,$content);
var_dump($content);


$reg='/\w/';
$str='aaawhat';
echo "<br>";
preg_match($reg,$str,$content);
var_dump($content);

// array (size=1)
//   0 => string '_' (length=1)
//
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP正则函数\2.w.php:14:
// array (size=1)
//   0 => string 'a' (length=1)

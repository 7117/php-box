<?php

$reg = '/a/';
$str = 'aaawhat';
preg_match($reg, $str, $content);
var_dump($content);


$reg = '/w/';
$str = 'aaawhat';
echo "<br>";
preg_match($reg, $str, $content);
var_dump($content);

//
// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\1.content.php:6:
// array (size=1)
//   0 => string 'a' (length=1)
//
// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\1.content.php:13:
// array (size=1)
//   0 => string 'w' (length=1)
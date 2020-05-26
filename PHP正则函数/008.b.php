<?php

$reg = '/\bis\b/';
$str = 'what is this?';
$aaa = preg_match($reg, 'was', $str);
var_dump($aaa);


// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\8.b.php:6:int 0
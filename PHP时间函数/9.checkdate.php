<?php
header('content-type:text/html;charset=utf-8');
$a=checkdate(11,11,2011);
var_dump($a);

$a=checkdate(111,11,2011);
var_dump($a);

// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP时间函数\9.checkdate.php:4:boolean true
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP时间函数\9.checkdate.php:7:boolean false
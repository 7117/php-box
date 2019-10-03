<?php

$a=fopen("D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP文件函数\d.php","r+");

$b=fgets($a);

var_dump($b);
fclose($a);
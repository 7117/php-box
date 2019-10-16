<?php


//获取文件的路径部分
//获取上一级的目录
$b=dirname($a);
// D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP路径函数
print_r($b);
echo "<br>";
$b=dirname($b);
// D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP
print_r($b);
echo "<br>";

<?php
// D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP路径函数\2.__FILE__.php
//获取绝对路径
$a=__FILE__;
print_r($a);
echo "<br>";

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

// D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP路径函数\2.__FILE__.php
$a=realpath($a);
print_r($a);
// D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP
$c=realpath($b);
print_r($c);
echo "<br>";

// D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP路径函数
$e=__DIR__;
print_r($e);

<?php
//fopen第一个参数是文件 字符串的类型即可
//第二个参数是打开的模式
//r是只读 从头开始
//w是只写 从头开始 如果不存在的话  会进行创建一个新文件
//a是只写 从尾部开始
//x是创建只写
//r+读写 文件指针从头开始
//w+读写 文件不存在会进行创建文件
//a+读写 文件从尾部开始  文件不存在会进行创建文件
//x+读写 创建文件
$a=fopen('D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件函数\d.php',"r+");

//fopen的
//第一个参数是fopen的对象
//第二个参数是filesize(文件)
$b=fread($a,filesize("D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件函数\d.php"));

//fclose(fopen的对象·)
fclose($a);

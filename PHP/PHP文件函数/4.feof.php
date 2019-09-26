<?php
//feof就是把文件进行读取完成
//一直读取到末尾
//while是在不知道多少个的时候进行使用  比较合适
//for循环适合在知道个数的情况下使用
$a=fopen("D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件函数\ddd.php","r");
echo "1";
while(!feof($a)){
    echo fgets($a);
    echo "<br>";
}
fclose($a);
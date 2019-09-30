<?php
$a=fopen("D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件函数\ddd.php","r+");

while(!feof($a)){
    echo fgetc($a);
    echo "<br>";
}

fclose($a);
<?php
$b=fopen("D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP文件函数\ccc.php","r+");

while(!feof($b)){
    echo fgetc($b);
    echo "<br>";
}

fclose($b);
<?php
$myfile = fopen("D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP转义字符\a.txt", "a+");
// var_dump($myfile);die();
$txt = "Bill Gates\r\n";
$txt = "Bill Gates\r\n";
fwrite($myfile, $txt);
fclose($myfile);
echo "222";

<?php

$reg = '/<img[^>]*src="([^"]*)" (.+)>/us';
// $reg = '/<img[^>]*src="(.+?)">/us';
$str = '<img src="https://profile.csdnimg.cn/0/9/7/3_fujian9544" class="avatar_pic" username="fujian9544">';
preg_match($reg, $str, $con);
var_dump($con);


// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\018.img.php:7:
// array (size=3)
//   0 => string '<img src="https://profile.csdnimg.cn/0/9/7/3_fujian9544" class="avatar_pic" username="fujian9544">' (length=98)
//   1 => string 'https://profile.csdnimg.cn/0/9/7/3_fujian9544' (length=45)
//   2 => string 'class="avatar_pic" username="fujian9544"' (length=40)
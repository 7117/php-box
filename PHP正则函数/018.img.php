<?php

$reg = '/<img src="([^"].+?)" [^>]* /';
$str = '<img src="https://profile.csdnimg.cn/0/9/7/3_fujian9544" class="avatar_pic" username="fujian9544">';
preg_match($reg, $str, $con);
var_dump($con);

// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\18.img.php:6:
// array (size=2)
//   0 => string '<img src="https://profile.csdnimg.cn/0/9/7/3_fujian9544" class="avatar_pic" ' (length=76)
//   1 => string 'https://profile.csdnimg.cn/0/9/7/3_fujian9544' (length=45)
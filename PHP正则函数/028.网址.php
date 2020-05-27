<?php

// 验证用户输入的密码是否符合规则
// 规则：6-20位字母、数字或符

$reg = "/^(http|https):\/\/.*$/";
$str = 'https://blog.csdn.net/fujian9544/article/details/106373640';
preg_match($reg, $str, $con);
var_dump($con);

// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\028.网址.php:9:
// array (size=2)
//   0 => string 'https://blog.csdn.net/fujian9544/article/details/106373640' (length=58)
//   1 => string 'https' (length=5)
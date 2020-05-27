<?php

// 验证用户输入的密码是否符合规则
// 规则：6-20位字母、数字或符

$reg = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+)\.[a-z]{2,6}$/i";
$str = '862890248@qq.com';
preg_match($reg, $str, $con);
var_dump($con);


// 0 => string 'idee(wdfwxwwx' (length=13)
<?php

// 验证用户输入的密码是否符合规则
// 规则：6-20位字母、数字或符

$reg = "/^1[3589][0-9]{9}$/";
$str = '13586749584';
preg_match($reg, $str, $con);
var_dump($con);


// 0 => string '13586749584' (length=11)
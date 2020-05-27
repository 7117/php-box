<?php


// 验证用户名是否符合规则
// 规则：6-30位字母、数字、_组合，以字母开头
$reg = '/^[a-zA-Z]\w{5,29}$/';
$str = 'ideewdfwxwwx';
preg_match($reg, $str, $con);
var_dump($con);


// 0 => string 'ideewdfwxwwx' (length=12)
<?php

$reg = '/.+/';
$str = '我爱你中国我爱你中国';
preg_match($reg, $str, $con);
var_dump($con);
// 0 => string '我爱你中国我爱你中国' (length=30)


$reg = '/.+?/';
$str = '我爱你中国我爱你中国';
preg_match($reg, $str, $con);
var_dump($con);
// 0 => string '我' (length=1)
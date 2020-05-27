<?php

$reg = '/is.+/';
$str = 'there is a mokn  sss  aaq';
preg_match($reg, $str, $con);
var_dump($con);

// 0 => string 'is a mokn  sss  aaq' (length=19)



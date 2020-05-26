<?php

$reg = '/[a-z]{1,5}/';
$str = 'csccscscaSccsdvdsvdf';
preg_match($reg, $str, $con);
var_dump($con);
// 0 => string 'csccs' (length=5)


$reg = '/[a-z]{1,5}?/';
$str = 'csccscscaSccsdvdsvdf';
preg_match($reg, $str, $con);
var_dump($con);
// 0 => string 'c' (length=1)
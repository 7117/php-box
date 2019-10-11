<?php

$reg="/\D/";
$str="sswwdw1234dede";
preg_match($reg,$str,$a);
var_dump($a);

// 0 => string 's' (length=1)
<?php

$reg = '/.+is$/';
$str = 'isswcwcscscscdsis';
preg_match($reg, $str, $con);
var_dump($con);

// array (size=1)
//   0 => string 'isswcwcscscscdsis' (length=17)
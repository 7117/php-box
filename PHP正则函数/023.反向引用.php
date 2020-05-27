<?php

$reg = '/([is].*?)/';
$str = 'isswcwcscscscdsis';
preg_match($reg, $str, $con);
var_dump($con);

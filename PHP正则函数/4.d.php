<?php

$reg='/\d/';
$str='dede12de';
preg_match($reg,$str,$aa);
var_dump($aa);
// 0 => string '1' (length=1)
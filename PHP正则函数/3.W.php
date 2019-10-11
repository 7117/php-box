<?php

$reg="/\W/";
$str="dfef?e_wwcc";
preg_match($reg,$str,$res);
echo "<br>";
print_r($res);


// Array ( [0] => ? )
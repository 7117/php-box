<?php


$a=date("YMD");
var_dump($a);
echo "<br>";
$a=date("Y");
var_dump($a);
echo "<br>";
$c=date("Y-M-D");
var_dump($c);

$d=date("Y m d h:i:s");
echo "<br>";
var_dump($d);


$dd=date("W");
echo "<br>";
var_dump($dd);
// string(10) "2019OctTue" 
// string(4) "2019" 
// string(12) "2019-Oct-Tue" 
// string(19) "2019 10 08 10:34:29"
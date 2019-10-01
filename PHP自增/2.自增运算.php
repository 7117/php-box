<?php

$a=10;
$b=$a+++$a++;
var_dump($a,$a);
var_dump($b,$b);
echo "<br>";
// int(12) int(12) int(21) int(21)

$c=10;
$d=++$c+(++$c);
var_dump($c,$c);
var_dump($d,$d);
// int(12) int(12) int(23) int(23)

<?php
// string(5) "werty"
$a=substr("qwertyuiop",1,5);
var_dump($a);
echo "<br>";


$c="a我是谁aa";
$a=substr($c,0,6);
$b=mb_substr($c,0,6);
var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";

// string(5) "werty"
// string(6) "a我�"
// string(12) "a我是谁aa"
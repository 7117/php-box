<?php

$a=11.11;

$b=filter_var($a,FILTER_VALIDATE_INT);

var_dump($b);
echo "<br>";
$c=1111;

$d=filter_var($c,FILTER_VALIDATE_INT);

var_dump($d);
echo "<br>";


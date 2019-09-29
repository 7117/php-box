<?php

$a=[1,2,4,5,6];
$b=[1,2,4,5,9];

// Array ( [4] => 6 )
$c=array_diff($a,$b);
print_r($c);

// Array ( [4] => 9 )
$d=array_diff($b,$a);
print_r($d);
<?php

$a=join('',array_rand(array_flip(range('a','z')),4));
print_r($a);

echo "<br>";

$aa=array_merge(array_flip(range('a','z')),array_flip(range('A','Z')));
$b=join('',array_rand($aa,4));
print_r($b);

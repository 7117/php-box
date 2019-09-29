<?php
$a=array_flip(array_merge(range(0,9),range('a','z'),range('A','Z')));
$a=array_rand($a,4);
$a=join('',$a);
print_r($a);
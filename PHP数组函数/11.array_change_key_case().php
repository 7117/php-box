<?php
$a=[
    'a'=>'aaa',
    'b'=>'aaa',
    'c'=>'aaa',
];

$a=array_change_key_case($a,1);
print_r($a);
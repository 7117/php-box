<?php

$a=[1,"a"=>"b",3,4];
$b=[5,"a"=>"a",7,8];

$c=array_merge_recursive($a,$b);
echo "<pre>";
print_r($c);
echo "</pre>";

// Array
// (
//     [0] => 1
//     [a] => Array
//            (
//             [0] => b
//             [1] => a
//            )
//     [1] => 3
//     [2] => 4
//     [3] => 5
//     [4] => 7
//     [5] => 8
// )
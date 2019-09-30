<?php

$a=['a','d','b','z','e'];
$b=array_multisort($a);
var_dump($a);

// array(5) {
//     [0]=>
//   string(1) "a"
//     [1]=>
//   string(1) "b"
//     [2]=>
//   string(1) "d"
//     [3]=>
//   string(1) "e"
//     [4]=>
//   string(1) "z"
// }
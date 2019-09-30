<?php

$a=array("aa","bb");
$b=array_pad($a,5,"cc");
print_r($b);

// Array
// (
// [0] =>; aa
// [1] =>; bb
// [2] =>; cc
// [3] =>; cc
// [4] =>; cc
// )
//

echo "<br>";
$d=array("aa","bb");
$e=array_pad($a,-5,"cc");
print_r($e);

// Array ( [0] => cc [1] => cc [2] => cc [3] => aa [4] => bb )

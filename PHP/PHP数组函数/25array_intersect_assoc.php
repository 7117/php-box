<?php

//更加的严格  会有键的比较 assoc的比较
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("a"=>"red","bd"=>"green","dc"=>"blue","d"=>"yellow");

$a3=array_intersect_assoc($a1,$a2);
print_r($a3);

// Array
// (
// [a] =>red
// [d] =>yellow
// )
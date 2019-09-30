<?php

$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");

$aa=array_intersect($a1,$a2);
print_r($aa);

// Array
// (
//     [a] =&gt; red
// [b] =&gt; green
// [c] =&gt; blue
// [d] =&gt; yellow
// )
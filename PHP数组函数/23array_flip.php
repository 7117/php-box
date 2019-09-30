<?php

$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$result=array_flip($a1);
print_r($result);

// Array
// (
// [red] =&gt; a
// [green] =&gt; b
// [blue] =&gt; c
// [yellow] =&gt; d
// )

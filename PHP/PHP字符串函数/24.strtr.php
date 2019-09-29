<?php
// 9wdefeeg4grvdq
// s9defeeg9grvdq
// string(28) "ccccccccccccxxxxffffffffffff"
$a=strtr("swdefeeg4grvdq","s","9");
print_r($a);
echo "<br>";

$b=strtr("swdefeeg4grvdq","4w","99");
print_r($b);

$a=[
	"a"=>"cccc",
	"b"=>"ffff"
];

$r=strtr("aaaxxxxbbb",$a);
echo "<br>";
var_dump($r);
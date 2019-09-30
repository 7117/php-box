<?php

$a=[
	'a','f','r','e','b'
];
sort($a);

$v=count($a);

foreach ($a as $key => $value) {
	var_dump($a[$key]);
	echo "<br>";
}
<?php

for($i=1;$i<5;$i++){
	var_dump($i);
	echo "<br>";
}

$a=[1,2,3,4,5];
foreach ($a as $key => $value) {
	var_dump($value);
	echo "<br>";
}
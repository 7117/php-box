<?php


$a=[
	"11",
	"22",
	"33"
];

foreach($a as $k=>$v){
	var_dump($a[$k]);
	echo "<br>";
}


for($i=0;$i<count($a);$i++){
	var_dump($a[$i]);
	echo "<br>";
}
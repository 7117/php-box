<?php


$c=[
	'diyige'=>[],
	'dierge'=>[],
	'disange'=>[
		'disige'=>[],
		'diwuge'=>1,
	],
];
$d=[
	'diyige'=>[],
	'dierge'=>[],
	'disange'=>[
		'disige'=>[],
		'diwuge'=>1,
	],
];

for($i=1;$i<3;$i++){
	$c['diyige']=$i;
	$c['disange']['disige'][]=$i;
}

for($i=1;$i<3;$i++){
	$d['diyige'][]=$i;
	$d['disange']['disige'][]=$i;
}

print_r($c);
echo "<br>";
print_r($d);
echo "<br>";
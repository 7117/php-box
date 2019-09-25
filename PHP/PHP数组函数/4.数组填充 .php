<?php
//单个的就一个值的就直接用键
//多个的就要用[]  不能用键
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
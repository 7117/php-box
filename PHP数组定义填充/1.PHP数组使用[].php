<?php

// 以下是使用【】的
$a=[
	'a'=>'red',
	'b'=>'bud'
];

print_r($a);
echo '<br>';

$b=[
	[1=>'a'],
	1=>'a',
	[2=>'b']
];

print_r($b);
echo '<br>';

$c=[
	'diyige'=>[],
	'dierge'=>[],
	'disange'=>[
		'disige'=>[],
		'diwuge'=>1,
	],
];


// 如不加一个[]的话 就只会有一个元素啊  其他的就不会被加进来了！！！
for($i=1;$i<3;$i++){
	$c['diyige'][]=$i;
	$c['disange']['disige'][]=$i;
}

print_r($c);
echo "<br>";


// dddd





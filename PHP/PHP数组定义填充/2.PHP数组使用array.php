<?php


// 以下是使用array()的
$j=array(
	'a'=>1,
	'b'=>[
		'c'=>'c',
		'd'=>'d',
	],
);

print_r($j);
echo "<br>";


$g=array(
	'd'=>[],
	'f'=>[
		'bh'=>[],
		'gv'=>1
	],

);

for($i=1;$i<3;$i++){
	$g['d'][]=$i;
	$g['f']['gv']=2;
	$g['f']['bh'][]=$i;
}

print_r($g);

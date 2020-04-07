<?php

$a=[
	'a'=>1,
	'b'=>2,
	'c'=>'d'
];
$c=http_build_query ($a);
// a=1&b=2&c=d
print_r($c);



$json=json_encode($a);
print_r($json);
// {"a":1,"b":2,"c":"d"}


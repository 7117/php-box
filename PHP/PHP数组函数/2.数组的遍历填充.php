<?php
$a = array('Tom','Mary','Peter','Jack');

foreach($a as $k=>$v){
	print_r($a[$k]);
	echo '<br>';
}

echo '<br>';

$b=[
	1,2,3,4,5,6
];
print_r($b);
foreach ($b as $key => $value) {
	$c[]=$value*2;
	echo "<br>";
}
print_r($c);
echo "<br>";

$d=[
	1,2,3,4,5,6
];
foreach ($d as $key => $value) {
	$d[]=$value*2;
	echo "<br>";
}

print_r($d);
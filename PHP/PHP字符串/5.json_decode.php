<?php
//true为数组 false为对象
$a=[
    1=> 'a',2=>'b',3=>'c',4=>'d',5=>'e'
];
$a=json_encode($a);

$arr=json_decode($a,true);
print_r($arr);
echo "<br>";

$arr=json_decode($a);
print_r($arr);
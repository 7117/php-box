<?php
$a=[
    1=> 'a',2=>'b',3=>'c',4=>'d',5=>'e'
];

$a=implode(',',$a);
$b=strlen($a);
var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";

$a=explode(',',$a);
$b=count($a);
var_dump($a);
echo "<br>";
var_dump($b);
<?php
$a=strtotime("2009-11-11 11-11-11");
$b=date("Y-m-d H:i:s",$a);
echo "<br>";
var_dump($b);

$c=date("Y-m-d H:i:s",time());
echo "<br>";
var_dump($c);
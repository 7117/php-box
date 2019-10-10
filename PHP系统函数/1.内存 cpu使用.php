<?php
//内存与内存峰值
$a=memory_get_usage();
var_dump($a);
echo "<br>";

$a=memory_get_peak_usage();
var_dump($a/1024/1024,"M");
echo "<br>";

//cpu的情况使用
$a=getrusage();
var_dump($a);
echo "<br>";


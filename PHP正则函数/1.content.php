<?php

$reg='/a/';
$str='aaawhat';
preg_match($reg,$str,$content);
var_dump($content);


$reg='/w/';
$str='aaawhat';
echo "<br>";
preg_match($reg,$str,$content);
var_dump($content);

<?php

$num=strpos('aaavV','V');
var_dump($num);
echo "<br>";

$num=stripos("aaavV",'V');
var_dump($num);
echo "<br>";

$num=strrpos('aaavV',"v");
var_dump($num);
echo "<br>";

$num=strripos('aaavV',"v");
var_dump($num);
echo "<br>";

// int(4)
// int(3)
// int(3)
// int(4)
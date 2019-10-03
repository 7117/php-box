<?php

$dir=__DIR__;
var_dump($dir);
echo "<br>";
$a=mkdir("$dir\\a\\",0777);
var_dump($a);
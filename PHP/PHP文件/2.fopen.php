<?php

$a=fopen("d.php","r+");

$b=fread($a);
var_dump($b);
fclose($b);

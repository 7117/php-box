<?php

$a=file_get_contents("http://www.baidu.com");
print_r($a);
echo "<br>";


$url="https://shimo.im/";
$b=file_put_contents($url,false);
var_dump($b);


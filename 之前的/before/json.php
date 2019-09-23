<?php
// 告诉浏览器以json编码  
header('Content-type:text/json');  

$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
// 没有设置则输出对象
var_dump(json_decode($json));
echo "<br>";
// 为true则为输出数组
var_dump(json_decode($json, true));
echo "<br>";


$array=array('a','f','q','d','a','g');
var_dump(json_encode($array,JSON_HEX_TAG));



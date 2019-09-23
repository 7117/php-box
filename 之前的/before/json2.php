<?php
// 告诉浏览器以json编码  
header('Content-type:text/json');  

$json = '{"fruit":{{"apple":"苹果"},{"banana":"苹果"}}';

// string(49) "{"fruit":{{"apple":"苹果"},{"banana":"苹果"}}"
var_dump($json);




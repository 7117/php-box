<?php
$x=17; 
$y="17";

// ==表明只要值相等即可
// ===表明值与属性都要相等

var_dump($x == $y); // 因为值相等，返回 true
echo "<br>";
var_dump($x === $y); // 因为类型不相等，返回 false
echo "<br>";
var_dump($x != $y); // 因为值相等，返回 false
echo "<br>";
var_dump($x !== $y); // 因为值不相等，返回 true
echo "<br>";
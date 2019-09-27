<?php
// 15
// 621

// global
$x=5;
$y=10; 
function ddddd()
{
    global $x,$y;
    $y=$x+$y;
}
 ddddd();
echo $y; // 输出 15
echo "<br>";



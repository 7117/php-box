<?php
//直接返回微妙数
$a=microtime();
echo $a;
echo "<br>";




//直接返回当前微秒的时间戳形式
$a=microtime(true);
echo $a;
echo "<br>";

//返回时间戳
$a=time();
echo $a;
echo "<br>";


// 0.26547000 1570526414
// 1570526414.2655
// 1570526414

<?php
//直接返回微妙数
$a=microtime();
echo $a;
echo "<br>";
$a=microtime();
echo $a;
echo "<br>";

//直接返回当前时间戳的微妙形式
$a=microtime(true);
echo $a;
echo "<br>";
//返回时间戳
$a=time();
echo $a;
echo "<br>";

<?php
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

// $GLOBAL['']
$x=511;
$y=110;
 
function myTsssssest()
{
	global $y;
    $y=$GLOBALS['x']+$GLOBALS['y'];
} 
 
myTsssssest();
echo $y;
echo "<br>";



// static
function myTest()
{
    static $x=0;
    echo $x;
    $x++;
    echo PHP_EOL;    // 换行符
}
 
myTest();
myTest();
myTest();

// 函数参数
function myTesst($x)
{
    echo $x;
}
myTesst(5);
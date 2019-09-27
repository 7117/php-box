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
// 621


// static
function myTest()
{
	// 通常，当函数完成/执行后，会删除所有变量。
	// 不过，有时我需要不删除某个局部变量。实现这一点需要更进一步的工作。
	// 一般的话  函数执行完成之后会进行删除变量
	// 但是static标注的变量不会被删除  会进行保留
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

// 0 1 2 5


// static
// 记住哦  静态变量用unset进行销毁不了
function wdwdw()
{

	echo "<br>";
	echo "<br>";
	echo "<br>";
    static $x=0;
    echo $x;
    $x++;
    unset($x);
    echo "<br>";
}
 
wdwdw();
wdwdw();
wdwdw();


// static
// 记住哦  静态变量用unset进行销毁不了
function dwdwdww()
{

	echo "<br>";
	echo "<br>";
	echo "<br>";
    $x=0;
    echo $x;
    $x++;
    // unset($x);
    echo "<br>";
}
 
dwdwdww();
dwdwdww();
dwdwdww();


// 15
// 621
// 0 1 2 5


// 0



// 1



// 2



// 0



// 0



// 0
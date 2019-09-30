<?php
$a=[
    0=> 'a',1=>'b',2=>'c',3=>'d',4=>'e'
];
var_dump($a);
unset($a[0]);
echo "<br>";
var_dump($a);
echo "<br>";

//没哟被销毁 因为一个全局一个局部
function des(){
    unset($b);
}
$b='1';
var_dump($b);
echo "<br>";
des();
var_dump($b);
echo "<br>";

//也没有被销毁
function ddd(){
    global $b;
    unset($b);
}
$b='1';
var_dump($b);
echo "<br>";
ddd();
var_dump($b);
echo "<br>";

//被销毁了
echo '$GLOBALS';
echo "<br>";
function fsa(){
    unset($GLOBALS['fff']);
}
$fff='1';
var_dump($fff);
echo "<br>";
fsa();
var_dump($fff);


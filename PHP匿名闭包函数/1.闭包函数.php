<?php
$count = 0;
$a = function () {
    var_dump($count);
};

$b = function () use ($count) {
    var_dump($count);
};
$count++;

$c = function () use (&$count) {
    var_dump($count);
};
$count++;

$d = function () use ($count) {
    var_dump($count);
};

$a();      // null   Notice: Undefined variable: count in
$b();      // int 0   截止至第七行
$count++;
$c();      // int 3  因为是一个全局的 截止到此行的计算值
$b();     // int 0   就截止到第七行
$d();     // int 2   截止至十七行
$count++;

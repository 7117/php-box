<?php
// date:2019-10-10 02:42:46内存使用：0.36801910400391m：变量的我是谁m

function aa(){
    return "函数";
}
$str="date:".(date("Y-m-d H:i:s"))."内存使用：".(aa());
echo $str;

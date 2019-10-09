<?php
// string(3) "dfe"
// string(3) "dfe"
// string(3) "dfe"
function aa(&$a){
    var_dump($a);
    echo "<br>";
    unset($GLOBALS['a']);
}

//测试输出
$a="dfe";
var_dump($a);
echo "<br>";

//这个表明函数并没有进行销毁了$a
aa($a);
var_dump($a);

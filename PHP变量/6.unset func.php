<?php

function aaa(){
    global $a;
    unset($a);
    var_dump($a);
}

$a=1;
aaa();
var_dump($a);

    // Notice: Undefined variable: a in D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP变量\6.unset func.php on line 6
    // NULL int(1)
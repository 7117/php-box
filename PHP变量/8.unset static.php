<?php
// Notice: Undefined variable: a in D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP变量\8.unset static.php on line 6
// NULL

function aa(){
    static $a=1;
    unset($a);
    echo "$a";
}

aa();
echo "<br>";

// Notice: Undefined variable: b in D:\phps\8.unset static.php on line 18
// Notice: Undefined variable: b in D:\phps\8.unset static.php on line 18
// Notice: Undefined variable: b in D:\phps\8.unset static.php on line 18
function b() {
    static $b;
    $b++;
    unset($b);
    echo "$b\n";
}
b();
b();
b();




function ff(){
    //没有销毁
    global $vv;
    unset($vv);

    //被销毁了
    // unset($GLOBALS['vv']);
}

$vv=1;
echo "<br>";
var_dump($vv);
echo "<br>";
ff();
var_dump($vv);
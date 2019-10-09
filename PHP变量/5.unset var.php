<?php

$a=1;
$b=1;
$c=1;
var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";
var_dump($c);
echo "<br>";

unset($a,$b,$c);

var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";
var_dump($c);
echo "<br>";

// int(1)
// int(1)
// int(1)
//
// Notice: Undefined variable: a in D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP变量\5.unset var.php on line 15
// NULL
//
// Notice: Undefined variable: b in D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP变量\5.unset var.php on line 17
// NULL
//
// Notice: Undefined variable: c in D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP变量\5.unset var.php on line 19
// NULL
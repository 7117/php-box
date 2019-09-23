<?php
/**
 * Created by PhpStorm.
 * User: sunxi
 * Date: 2019/9/23
 * Time: 16:43
 */

$a=['a','b','c'];
list($a,$b,$c)=$a;
var_dump($a,$b,$c);

echo "<br>";
$d=['a','b','c','d'];
//第四个元素给丢弃了
list($a,$b,$c)=$d;
var_dump($a,$b,$c);
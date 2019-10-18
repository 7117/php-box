<?php
/**
 * Created by PhpStorm.
 * User: sunxi
 * Date: 2019/9/23
 * Time: 16:30
 */

$aa=str_replace('a','v','gva',$count1);
var_dump($aa);
echo "<br>";
var_dump($count1);

echo "<br>";
$aa=str_replace('a','v','gvaaaaaavaaa',$count2);
var_dump($aa);
echo "<br>";
var_dump($count2);

// string(3) "gvv"
// int(1)
// string(12) "gvvvvvvvvvvv"
// int(9)
$category_name1="sswseewcwcwe,ddwdwqd,wdeWWDWE";
var_dump($category_name1);
echo "<br>";
$a=str_replace(",","','",$category_name1);
var_dump($a);
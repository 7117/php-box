<?php
/**
 * Created by PhpStorm.
 * User: sunxi
 * Date: 2019/9/23
 * Time: 18:16
 */

$path = "/testweb/home.php";
$a=basename($path);
var_dump($a);
echo "<br>";

$path = "/testweb/home.php";
$a=basename($path,'.php');
var_dump($a);
echo "<br>";


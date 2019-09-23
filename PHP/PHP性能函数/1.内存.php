<?php
/**
 * Created by PhpStorm.
 * User: sunxi
 * Date: 2019/9/23
 * Time: 17:47
 */
$a=memory_get_usage();
var_dump($a);
echo "<br>";

$a=memory_get_peak_usage();
var_dump($a);
echo "<br>";

$a=getrusage();
var_dump($a);
echo "<br>";
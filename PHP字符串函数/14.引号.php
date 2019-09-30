<?php
/**
 * Created by PhpStorm.
 * User: sunxi
 * Date: 2019/9/23
 * Time: 22:12
 */


//双引号里面不能有双引号  可以有单引号  变量依然解析
//单引号里面不能有单引号  可以有双引号  变量不会被解析
$a="s";
$b="u";
$c="$a '$b'  ";
var_dump($c);

$d='aa$aaa"{$b}"';
var_dump($d);
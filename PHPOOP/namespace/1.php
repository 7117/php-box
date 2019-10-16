<?php
//本文件内进行继承
namespace PHPOOP;

class oop{
    public $a=11111111;
}

class ooc extends oop{

}

$ooc=new ooc();
$a=$ooc->a;
var_dump($a);

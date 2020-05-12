<?php

namespace PHPDesignPattern\two;

use PHPDesignPattern\two\Factory;

include "./Factory.php";

$obj1 = Factory::createObj();
$obj2 = Factory::createObj();
$obj3 = Factory::createObj();

var_dump($obj1);
var_dump($obj2);
var_dump($obj3);

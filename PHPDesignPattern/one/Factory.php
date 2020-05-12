<?php

namespace PHPDesignPattern\one;

use PHPDesignPattern\one\Db;

include "./Db.php";

class Factory
{
    public static function createObj()
    {
        $db = new Db();
        return $db;
    }
}
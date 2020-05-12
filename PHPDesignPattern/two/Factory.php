<?php

namespace PHPDesignPattern\two;

use PHPDesignPattern\two\Db;

include "./Db.php";

class Factory
{
    public static function createObj()
    {
        $db = Db::getInstance();
        return $db;
    }
}
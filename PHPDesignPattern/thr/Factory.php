<?php

namespace PHPDesignPattern\thr;

use PHPDesignPattern\thr\Db;

include "./Db.php";

class Factory
{
    public static function createObj()
    {
        $db = Db::getInstance();
        return $db;
    }
}
<?php

class Single
{
    private static $obj;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getSingle()
    {
        if (self::$obj instanceof self) {
            return self::$obj;
        } else {
            self::$obj = new self();
            return self::$obj;
        }
    }
}

// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHPDesignPattern\2.单例.php:29:
// object(Single)[1]
$obj = Single::getSingle();
var_dump($obj);

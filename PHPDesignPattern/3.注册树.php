<?php


class Obj
{
    public static function newObj()
    {
        return new self();
    }
}

class Register
{
    public static $tree;

    public static function set($alias, $obj)
    {
        return self::$tree[$alias] = $obj;
    }

    public static function get($alias)
    {
        return self::$tree[$alias];
    }
}

// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHPDesignPattern\3.注册树.php:25:
// object(Obj)[1]
// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHPDesignPattern\3.注册树.php:28:
// object(Obj)[1]

$set = Register::set('rand', Obj::newObj());
var_dump($set);

$get = Register::get('rand');
var_dump($get);
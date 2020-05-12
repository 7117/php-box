<?php

//创建单例
class Single
{
    public $hash;
    static protected $ins = null;

    final protected function __construct()
    {
        $this->hash = rand(1, 9999);
    }

    static public function getInstance()
    {
        if (self::$ins instanceof self) {
            return self::$ins;
        }
        self::$ins = new self();
        return self::$ins;
    }
}

//工厂模式
class RandFactory
{
    public static function factory()
    {
        return Single::getInstance();
    }
}

//注册树
class Register
{
    protected static $objects;

    public static function set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }

    public static function get($alias)
    {
        return self::$objects[$alias];
    }

    public static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}

Register::set('rand', RandFactory::factory());

var_dump(RandFactory::factory());

$object = Register::get('rand');

var_dump($object);
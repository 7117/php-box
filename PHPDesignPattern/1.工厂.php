<?php

//要创建对象实例的类
class MyObject
{

}

//工厂类
class MyFactory
{
    public static function factory()
    {
        return new MyObject();
    }
}


$instance = MyFactory::factory();
// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHPDesignPattern\1.工厂.php:17:
// object(MyObject)[1]
var_dump($instance);
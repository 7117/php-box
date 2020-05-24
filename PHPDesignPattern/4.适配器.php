<?php

/**
 * 目标角色
 */
interface Target
{

    /**
     * 源类也有的方法1
     */
    public function sampleMethod1();

    /**
     * 源类没有的方法2
     */
    public function sampleMethod2();
}

/**
 * 源角色
 */
class Adaptee
{

    /**
     * 源类含有的方法
     */
    public function sampleMethod1()
    {
        echo 'Adaptee sampleMethod1 <br />';
    }
}

/**
 * 类适配器角色
 * 在适配器里面进行丰富主体定义的方法
 */
class Adapter implements Target
{

    private $_adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->_adaptee = $adaptee;
    }

    /**
     * 委派调用Adaptee的sampleMethod1方法
     */
    public function sampleMethod1()
    {
        $this->_adaptee->sampleMethod1();
    }

    /**
     * 源类中没有sampleMethod2方法，在此补充
     */
    public function sampleMethod2()
    {
        echo 'Adapter sampleMethod2 <br />';
    }

}

$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);
$one = $adapter->sampleMethod1();
var_dump($one);
$two = $adapter->sampleMethod2();
var_dump($two);

// Adaptee sampleMethod1
// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHPDesignPattern\4.适配器.php:70:null
// Adapter sampleMethod2
// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHPDesignPattern\4.适配器.php:72:null
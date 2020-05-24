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

class Client
{

    /**
     * Main program.
     */
    public static function main()
    {
        $adaptee = new Adaptee();
        $adapter = new Adapter($adaptee);
        $adapter->sampleMethod1();
        $adapter->sampleMethod2();

    }

}
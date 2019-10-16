<?php

//对象只能访问public方法
//protected与private都是只能在类的里面进行访问
//protected是在自身与子类中可以进行访问
//private是在自身类中可以访问
class Human{
    public $name="aaa";

    protected function eat(){
        echo "human";
    }
}

class Player extends Human {
    private $age=11;

    public function run(){
        echo $this->name;
    }

    public function get(){
        echo $this->age;
    }
}

$a=new Player();
echo $a->get();

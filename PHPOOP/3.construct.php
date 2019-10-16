<?php

date_default_timezone_get("PRC");

class Player{
    public $name="aaaa";
    public $num=23;

    public function __construct($name){
        $this->name=$name;
        echo "我是初始化";
    }

    public function run(){
        echo "\n\rdddd\r\n";
    }
}

$obj=new Player("bbbb");
echo $obj->name;
echo $obj->run();



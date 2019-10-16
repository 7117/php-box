<?php

class Player{
    public $name="aaaa";
    public $num=23;

    public function run(){
        echo "\n\rdddd\r\n";
    }
}

$obj=new Player();
echo $obj->name;
echo $obj->run();



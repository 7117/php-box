<?php

class Human{
    public $name;

    protected function eat(){
        echo "human";
    }
}

class Player extends Human {
    public $name="1a";

    public function run(){
        echo "run";
    }
}

$a=new Player();
$a->run();
$a->eat();

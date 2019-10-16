<?php

class Human{
    public $name;

    public function eat(){
        echo "human";
    }
}

class Player extends Human {
    public $name="1a";

    public function run(){
        echo "run";
    }
}


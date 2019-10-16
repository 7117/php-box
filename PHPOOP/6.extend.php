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

$player=new Player();
$player->eat();
$name=$player->name;
echo "<br>"."palyername".$name."<br>";

$human=new Human();
$a=$human->name;
echo "<br>"."palyername".$a."<br>";

<?php

abstract class aa{
    abstract public function eat();

    public function drink($food){
        echo $food;
    }
}

class human extends aa{
    public function eat(){
        echo "eat";
    }
}

class monkey extends aa{
    public function eat(){
        echo "eat";
    }
}

$ren=new human();
$ren->eat();
$ren->drink("water");
echo "<br>";

$monkey=new monkey();
$monkey->eat();
$monkey->drink("fruit");

// eatwater
// eatfruit
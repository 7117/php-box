<?php

interface eat{
    public function eat($food);
}

class ren implements eat{
    public function eat($food){
        echo $food;
    }
}

class cat implements eat{
    public function eat($food){
        echo $food;
    }
}

// noodle
// fish
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPOOP\12.interface.php:26:boolean true

$ren=new ren();
$ren->eat("noodle");
echo "<br>";
$cat=new cat();
$cat->eat("fish");
var_dump($ren instanceof eat);
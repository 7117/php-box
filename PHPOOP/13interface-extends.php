<?php

interface eat{
    public function eat($food);
}
interface drink extends eat{
    public function drink();
}

class ren implements drink {
    public function eat($food){
        echo $food;
    }
    public function drink(){
        echo "drink";
    }
}
// fish
$ren=new ren();
$ren->eat("fish");

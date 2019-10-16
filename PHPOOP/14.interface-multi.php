<?php

interface eat{
    public function eat($food);
}
interface drink{
    public function drink();
}

class ren implements drink,eat {
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

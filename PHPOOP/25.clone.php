<?php

//__clone在clone的时候会被调用
class aa{
    public $name;

    public function __clone(){
        $this->name="clone";
    }
}

$aa=new aa();
echo $aa->name="kobe";
$bb=clone $aa;
echo $bb->name;

// kobe
// clone
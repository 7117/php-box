<?php

//把对象作为方法替补输出的方法
class aa{
    public $aa='a';

    public function __invoke()
    {
        echo "invoke";
    }
}

$res=new aa();
$res();


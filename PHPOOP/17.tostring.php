<?php

// 把对象作为字符串替补输出的方法
class aa{
    public $aa='a';

    public function __toString()
    {
        return "tostring";
    }
}

$res=new aa();
echo $res;


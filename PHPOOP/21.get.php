<?php
//属性的替补  当属性不存在或者不可访问的时候  进行获取调用__get()  进行设置调用__set()
class bb{
    public $age="age";

    private $food="fruit";

    public function __get($name){
        echo "get";
    }
}
class aa extends bb{

    public function __get($name){
        echo "get";
    }

    public function get(){
        echo $this->food;
    }
}
//get
$aa=new aa();
echo $aa->get();
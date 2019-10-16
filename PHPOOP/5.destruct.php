<?php

date_default_timezone_get("PRC");

class Player{
    public $name="aaaa";

    public function __construct($name){
        $this->name=$name;
        echo "开始";
    }
    //用于程序使用的资源
    public function __destruct(){
        echo "结束";
    }

    public function run(){
        echo "run";
    }
}

$obj=new Player("bbbb");
echo $obj->name;
echo $obj->run();
$objone=&$obj;                       //表示对象的结束  会调用析构函数
$obj=null;
echo "<br>"."设置为空";
//不加的直接值传递的
// 开始bbbbrun
// 设置为空结束

//加上&的引用传递的
// 开始bbbbrun结束
// 设置为空


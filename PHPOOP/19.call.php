<?php

//作用：替补方法
class aa{
    public $name="name";

    //被当成被调用的方法  这个__call是进行替补上来的
    //$name是原方法名字
    //$arguments是里面的参数
    //对于对象调用的方法里面来说里面全是参数
    public function __call($name,$arguments){
        echo $name;
        echo "<br>";
        var_dump($arguments);
    }
}

$aa=new aa();
$aa->func("aa","bb");
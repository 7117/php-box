<?php
class myclass {
    function myfunc0()
    {
        echo "1";
    }

    function myfunc1()
    {
        echo "1";
    }

    function myfunc2()
    {
        echo "1";
    }
}

$a=get_class_methods("myclass");
$b=get_class_methods(new myclass());

//返回的是数组啊！！！
var_dump($a);
echo "<br>";
var_dump($b);
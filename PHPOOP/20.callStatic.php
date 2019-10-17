<?php

//作用：替补方法
class aa{
    public static function __callStatic($name,$arguments){
        echo "callstatic";
        echo "<br>";
        echo $name;
        echo "<br>";
        var_dump($arguments);
        echo "<br>";
    }
}

aa::func("aa","bb");


// callstatic
// func
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPOOP\20.callStatic.php:9:
// array (size=2)
//   0 => string 'aa' (length=2)
//   1 => string 'bb' (length=2)


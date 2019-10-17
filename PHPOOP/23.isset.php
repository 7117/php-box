<?php

class aa{
    private $name="sx";

}

class bb extends aa{
    public function __isset($na){
        echo "mongo";
        echo "<br>";
        var_dump($na);
    }
}

$bb=new bb();
echo isset($bb->name);
echo "<br>";
echo empty($bb->name);
echo "<br>";
// mongo
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPOOP\23.isset.php:12:string 'name' (length=4)
//
// mongo
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPOOP\23.isset.php:12:string 'name' (length=4)
// 1
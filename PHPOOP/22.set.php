<?php

class aa{
    private $name="sx";

}

class bb extends aa{
    public function __set($name,$value){
        var_dump($name);
        var_dump($value);
        echo "<br>";
        echo $this->name="mongo";
    }
}

$bb=new bb();
$bb->name="rrrr";

// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPOOP\22.set.php:10:string 'name' (length=4)
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPOOP\22.set.php:11:string 'rrrr' (length=4)
//
// mongo
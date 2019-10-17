<?php

class aa{
    private $name="sx";
}

class bb extends aa{
    public function __unset($na){
        echo "unset";
        var_dump($na);
    }
}

$bb=new bb();
unset($bb->name);

// unset
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPOOP\24.unset.php:10:string 'name' (length=4)

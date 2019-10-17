<?php

$a='{"a":"1","b":"2"}';
echo $a;
$b=json_decode($a);
var_dump($b);
echo "<br>";
$a=json_decode($a,true);
var_dump($a);


// {"a":"1","b":"2"}
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPJSON\2.reeasy.php:6:
// object(stdClass)[1]
//   public 'a' => string '1' (length=1)
//   public 'b' => string '2' (length=1)
//
// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPJSON\2.reeasy.php:9:
// array (size=2)
//   'a' => string '1' (length=1)
//   'b' => string '2' (length=1)
<?php
setcookie("user","assssssaa",time()+100);

$a=$_COOKIE["user"];
var_dump($a);

setcookie("user","",time()-1);
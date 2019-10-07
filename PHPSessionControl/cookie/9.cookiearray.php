<?php

setcookie("user[aa]","aa",strtotime("+7 days"));
setcookie("user[bb]","bb",strtotime("+7 days"));
setcookie("user[cc]","cc",strtotime("+7 days"));


echo "<pre>";
//cookie此时是一个二维数组
var_dump($_COOKIE['user']);
echo "</pre>";
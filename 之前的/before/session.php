<?php

$value="aa";
// 有效期5秒
setcookie("name",$value,time()+10,"./a/");



$savePath="./a/";
session_save_path($savePath);

$lifetime=5;
session_set_cookie_params($lifetime);

session_start();




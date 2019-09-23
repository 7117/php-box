<?php

// 保存在当前目录
$a="./";
session_save_path($a);
// sesssion时间
$lifetime=5;
session_set_cookie_params($lifetime);

//启动session的初始化
session_start();
//注册session变量，赋值为一个用户的名称
$_SESSION["username"]="skygao";

// 注销单个的变量
unset($_SESSION['username']);

// 销毁全部的变量
session_destroy();
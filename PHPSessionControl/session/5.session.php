<?php
session_start();

$_SESSION['a']='a';
$_SESSION['b']='b';

//最外面的双引号表明是字符串  里面的都会被解析
//中间层的单引号表明是字符串
//最里层的双引号会进行解析变量  session_name()是变量的
echo "<a href='6.test.php?".session_name()."=".session_id()."'>按钮</a>";
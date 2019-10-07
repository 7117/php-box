<?php
session_start();

$_SESSION['cc']='cc';
$_SESSION['dd']='dd';
//设置过期一天
setcookie(session_name(),session_id(),time()+24*3600);
<?php
header('content-type:text/html;charset=utf-8');

// date_default_timezone_set("Asia/Shanghai");
ini_set('date.timezone','Asia/Shanghai');
$zone=date_default_timezone_get();
echo date("ymd his");
var_dump($zone);


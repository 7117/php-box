<?php
date_default_timezone_set("Asia/Shanghai");

$startdate=time();
$enddate = strtotime("+6 weeks",$startdate);

var_dump($enddate);


$a=date("YMD h:i:s",$enddate);
var_dump($a);
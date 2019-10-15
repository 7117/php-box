<?php
date_default_timezone_set("Asia/Shanghai");

$startdate=time();
$enddate = strtotime("+6 weeks",$startdate);
$a=date("YMD h:i:s",$enddate);
var_dump($a);

$time=date("YMD h:i:s",strtotime("now")+24*3600);
var_dump($time);
echo "<br>";
$time=date("YMD h:i:s",strtotime("+5 days")+24*3600);
var_dump($time);
echo "<br>";
$time=date("YMD h:i:s",strtotime("+1 month")+24*3600);
var_dump($time);
echo "<br>";
$time=date("YMD h:i:s",strtotime("+2 years 1 month 12 days")+24*3600);
var_dump($time);
echo "<br>";
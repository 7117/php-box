<?php

$a=date("H");
var_dump($a);

if($a>20){
	echo "晚上";
}else{
	echo "白天";
}

$b=date("H");
if($b>2){
	echo "凌晨";
}elseif($b>10){
	echo "中午";
}else{
	echo "晚上";
}
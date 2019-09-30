<?php
// isset空
// is_null空
// 空空空空空空空
$a=null;
if(!isset($a)){
    echo "isset空";
    echo "<br>";
}

$a=null;
if(is_null($a)){
    echo "is_null空";
    echo "<br>";
}


$a=0;
if(empty($a)){
    echo "空";
}

$a=[];
if(empty($a)){
    echo "空";
}

$a="";
if(empty($a)){
    echo "空";
}

$a=false;
if(empty($a)){
    echo "空";
}

$a=null;
if(empty($a)){
    echo "空";
}

$a="0";
if(empty($a)){
    echo "空";
}


$a=111;
unset($a);
if(empty($a)){
    echo "空";
}






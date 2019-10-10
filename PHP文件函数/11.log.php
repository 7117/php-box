<?php

function logfunc($str,$name){
    $file=dirname(__FILE__);
    $day=date('Ymd');
    $dir=$file.'\\'.$day;
    if(!file_exists($dir)){
        mkdir($dir,0777);
        chmod($dir,0777);
    }

    $file=$dir.'\\'.$name.'.log';

    $handle=fopen($file,'a+');
    $res=fwrite($handle,$str);
    fclose($handle);
    return $file;
}

$str="aa\r\nbb\r\ncc\r\n";
$name=date('Ymd');
logfunc($str,$name);
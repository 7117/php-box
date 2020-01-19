<?php

$num=strpos('aaavV','V');
var_dump($num);
echo "<br>";

$num=stripos("aaavV",'V');
var_dump($num);
echo "<br>";

$num=strrpos('aaavV',"v");
var_dump($num);
echo "<br>";

$num=strripos('aaavV',"v");
var_dump($num);
echo "<br>";

$num=strpos('avV',"av");
var_dump($num);
echo "<br>";

$num=(0==FALSE);
var_dump($num);
echo "<br>";

$num=strpos('a,b,c', 'a');
var_dump($num);
echo "<br>";

if (strpos('a,b,c', 'a')!==false) {
    echo "1";
}else{
    echo "2";
}
echo "<br>";

// int(4)
// int(3)
// int(3)
// int(4)
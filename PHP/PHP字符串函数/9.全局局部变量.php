<?php
//g通过$GLOBALS与global进行定义
function fsa(){
    $a=$GLOBALS['fff'];
    var_dump($a);
}

$fff='aa';
fsa();
echo "<br>";

function gfv(){
    global $fff;
    print_r($fff);
}

$fff='aa';
gfv();

//不识别
function sssww(){
    print_r($fff);
}

$fff='aa';
sssww();



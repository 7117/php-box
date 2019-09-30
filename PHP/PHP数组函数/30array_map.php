<?php

function aaa($a){
    return $a*2;
}

$aa=[1,2,3,4,5];

$aaa=array_map("aaa",$aa);
var_dump($aaa);


// array(5) {
//     [0]=&gt;
//     int(2)
//     [1]=&gt;
//     int(4)
//     [2]=&gt;
//     int(6)
//     [3]=&gt;
//     int(8)
//     [4]=&gt;
//     int(10)
// }

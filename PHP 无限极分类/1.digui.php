<?php

function deep($a=1){
    echo $a;
    echo "<br>";
    $a++;
    if($a<10){
        deep($a);
    }
}

deep();
// 1
// 2
// 3
// 4
// 5
// 6
// 7
// 8
// 9
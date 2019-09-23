<?php

$a=array('1','4','6','0','2','100','3');

function bubble($a){
    $data='';
    for($i=0;$i<count($a);$i++){
        for($j=$i+1;$j<count($a);$j++){
            if($a[$i]>$a[$j]){
                $data=$a[$i];
                $a[$i]=$a[$j];
                $a[$j]=$data;
            }
        }
    }
    echo '<pre>';
    print_r($a);
    echo '<pre>';
}

bubble($a);


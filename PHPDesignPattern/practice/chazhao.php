<?php

$arr = [1, 4, 5, 6, 7, 8, 9, 12];

function seek($arr, $val)
{
    $max = count($arr);
    $min = 0;

    while ($min <= $max) {

        $mid = intval(($max + $min) / 2);
        if ($arr[$mid] == $val){
            return "zhao";
        }elseif ($val < $arr[$mid]){
            $max  = $mid-1;
        }elseif ($val > $arr[$mid]){
            $min = $mid + 1;
        }
    }
}

echo "开始";
echo seek($arr, 5);
echo "结束";

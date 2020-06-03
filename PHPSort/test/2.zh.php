<?php

function ks($arr, $value)
{

    $low = 0;
    $high = count($arr);

    while ($low < $high) {

        $mid = intval(($low + $high) / 2);

        if ($arr[$mid] == $value) {
            return "get";
        } elseif ($arr[$mid] < $value) {
            $low = $mid + 1;
        } elseif ($arr[$mid] > $value) {
            $high = $mid - 1;
        }

    }

    return "no val";

}


$arr = array(1, 3, 5, 7, 7, 9, 25, 68, 98, 145, 673, 8542);
echo ks($arr, 8542);
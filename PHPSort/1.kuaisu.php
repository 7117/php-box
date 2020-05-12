<?php

$a = array(2, 13, 42, 34, 56, 23, 67, 365, 87665, 54, 68, 3);


function quicksort($a)
{

    if (count($a) <= 1) {
        return $a;
    }

    $mid = $a[0];

    $left = array();
    $right = array();

    foreach ($a as $k => $v) {
        if ($k > 0) {
            if ($mid < $v) {
                $right[] = $a[$k];;
            } else {
                $left[] = $a[$k];;
            }
        }
    }


    // for ($i=1; $i < count($a); $i++) {
    //     if ($mid < $a[$i]) {
    //         // 大于中间值
    //         $right[] = $a[$i];
    //     } else {
    //         // 小于中间值
    //         $left[] = $a[$i];
    //     }
    // }
    //


    $left = quicksort($left);
    $right = quicksort($right);

    $res = array_merge($left, array($mid), $right);

    return $res;
}


print_r(quicksort($a));
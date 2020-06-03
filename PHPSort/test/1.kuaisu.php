<?php

function ks($arr)
{

    if (count($arr) <= 1) {
        return $arr;
    }

    $mid = $arr[0];

    $left = array();
    $right = array();

    foreach ($arr as $k => $v) {
        if ($k > 0) {
            if ($mid < $v) {
                $right[] = $arr[$k];;
            } else {
                $left[] = $arr[$k];;
            }
        }
    }

    $left = ks($left);
    $right = ks($right);

    $res = array_merge($left, [$mid], $right);

    return $res;
}


$arr = [1, 5, 33, 0, 20, 2];
$res = ks($arr);
var_dump($res);
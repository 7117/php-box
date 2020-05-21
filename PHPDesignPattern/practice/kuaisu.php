<?php


$arr = [3, 2, 8, 1, 9, 4, 1, 19, 2];
function bubble($arr)
{
    $left = [];
    $right = [];

    if (count($arr) <= 1) {
        return $arr;
    }

    $mid = $arr[0];


    foreach ($arr as $k => $v) {
        if ($k > 0) {
            if ($v < $mid) {
                $left[] = $arr[$k];
            } else {
                $right[] = $arr[$k];
            }
        }
    }

    $left = bubble($left);
    $right =bubble($right);

    $res = array_merge($left, array($mid), $right);

    return $res;

}

$res = bubble($arr);
var_dump($arr);
var_dump($res);
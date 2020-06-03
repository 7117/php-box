<?php


function bin_search($arr, $val)
{
    $low = 0;
    $high = count($arr);

    while ($low <= $high) {

        $mid = intval(($low + $high) / 2);

        if ($arr[$mid] == $val) {
            return "找到了" . "_" . $arr[$mid];
        } elseif ($val > $arr[$mid]) {
            $low = $mid + 1;
        } elseif ($val < $arr[$mid]) {
            $high = $mid - 1;
        }
    }

    return "no value";
}

$arr = array(1, 3, 5, 7, 7, 9, 25, 68, 98, 145, 673, 8542);
echo bin_search($arr, 7);

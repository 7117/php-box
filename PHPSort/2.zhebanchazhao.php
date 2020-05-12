<?php


function bin_search($arr, $val)
{
    $low = 0;
    $high = count($arr);
    $index = 0;

    while ($low <= $high) {

        $mid = intval(($low + $high) / 2);
        $index++;

        if ($arr[$mid] == $val) {
            return "找到了" . "_" . $arr[$mid] . "_" . "索引" . $mid;
        } elseif ($val > $arr[$mid]) {
            $low = $mid + 1;
        } elseif ($val < $arr[$mid]) {
            $high = $mid - 1;
        }
    }
}

$arr = array(1, 3, 5, 7, 7, 9, 25, 68, 98, 145, 673, 8542);
echo "开始" . PHP_EOL;
echo bin_search($arr, 673);

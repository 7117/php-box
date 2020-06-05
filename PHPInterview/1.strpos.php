<?php

$a = "abcdefg";
$b = "abrbcde";
//4-2

$a = str_split($a);
$b = str_split($b);


foreach ($a as $k1 => $v1) {
    foreach ($b as $k2 => $v2) {
        if ($b[$k2] == $a[$k1]) {

            $num = count($b) - $k2;
            $res = array($b[$k2]);

            for ($i = 1; $i < $num; $i++) {
                if ($b[$k2 + $i] == $a[$k1 + $i]) {
                    $res = array_merge($res, array($b[$k2 + $i]));
                }
            }

            $info[] = $res;
        }
    }
}

$temp = $info[0];

foreach ($info as $k => $v) {
    if (count($temp) < count($v)) {
        $temp = $v;
    }
}

var_dump(implode($temp));

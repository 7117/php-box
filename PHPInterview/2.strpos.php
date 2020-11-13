<?php

function strposBySelf($strA, $strB)
{
    $strA = str_split($strA);
    $strB = str_split($strB);

    foreach ($strA as $k1 => $v1) {
        foreach ($strB as $k2 => $v2) {
            if ($strB[$k2] == $strA[$k1]) {

                $loopNum = count($strB) - $k2 - 1;
                $res = [$strB[$k2]];

                for ($i = 1; $i <= $loopNum; $i++) {
                    if ($strB[$k2 + $i] == $strA[$k1 + $i]) {
                        $res = array_merge($res, [$strB[$k2 + $i]]);
                    }
                }
                return $res;
            }
        }
    }
}

$strA = "abcdefg";
$strB = "def";
$res = strposBySelf($strA, $strB);

if (is_null($res)) {
    echo "NO MATCH";
} else {
    echo implode($res);
}


print_r("11");
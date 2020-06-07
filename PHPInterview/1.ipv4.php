<?php
$ipv4 = "192.168.11.1";

//方法一
function usePhpFunc($ipv4)
{
    if (filter_var($ipv4, FILTER_VALIDATE_IP)) {
        return "method one:yes" . PHP_EOL;
    } else {
        return "method one:no" . PHP_EOL;
    }
}

$res = usePhpFunc($ipv4);
print_r($res);

// 方法二
function defineBySelf($ipv4)
{
    $ipArr = explode(".", $ipv4);

    if (count($ipArr) !== 4) {
        return "method two:no" . PHP_EOL;
    }

    foreach ($ipArr as $k => $v) {
        if (!($v >= 0 && $v <= 255)) {
            return "method two:no" . PHP_EOL;
        }
    }

    return "method two:yes" . PHP_EOL;
}

$res = defineBySelf($ipv4);
print_r($res);

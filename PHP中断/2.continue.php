<?php

/*
 * PHP中continue只能终止本次循环而进入到下一次循环中，
 * continue $num 可以指定终止第几重的当前循环  num不能大于最大循环层数
 */
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

for ($i = 0; $i < 10; $i++) {
    echo "\n";
    echo $i." " ;
    // if ($i % 2 == 0) {
    //     continue;
    // }
    for (; ;) {
        for ($j = 0; $j < count($arr); $j++) {
            if ($j == $i) {
                continue 3; //终止第三层的当前循环
            } else {
                echo "\$arr[" . $j . "]:" . $arr[$j] . " ";
            }
        }
    }
    echo "这里也绝对不会输出";
}

// 0
// 1 $arr[0]:1
// 2 $arr[0]:1 $arr[1]:2
// 3 $arr[0]:1 $arr[1]:2 $arr[2]:3
// 4 $arr[0]:1 $arr[1]:2 $arr[2]:3 $arr[3]:4
// 5 $arr[0]:1 $arr[1]:2 $arr[2]:3 $arr[3]:4 $arr[4]:5
// 6 $arr[0]:1 $arr[1]:2 $arr[2]:3 $arr[3]:4 $arr[4]:5 $arr[5]:6
// 7 $arr[0]:1 $arr[1]:2 $arr[2]:3 $arr[3]:4 $arr[4]:5 $arr[5]:6 $arr[6]:7
// 8 $arr[0]:1 $arr[1]:2 $arr[2]:3 $arr[3]:4 $arr[4]:5 $arr[5]:6 $arr[6]:7 $arr[7]:8
// 9 $arr[0]:1 $arr[1]:2 $arr[2]:3 $arr[3]:4 $arr[4]:5 $arr[5]:6 $arr[6]:7 $arr[7]:8 $arr[8]:9

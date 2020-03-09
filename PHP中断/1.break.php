<?php
/*
 * 在PHP中break语句不仅可以跳出当前循环，还可以指定跳出几层循环
 * break $num;  num为向外跳的层数 num不能大于最大循环层数
 */
//  第三重循环
while (true) {
    //  第二重
    for (; ;) {
        //  第一重
        for ($i = 0; $i <= 10; $i++) {
            echo "$i ";
            if ($i == 7) {
                echo "i=7, 跳出1重循环";
                break;
            }
        }
        echo "\n";
        //  第一重
        for ($i = 0; $i <= 20; $i++) {
            echo "$i ";
            if ($i == 15) {
                echo "i=15, 跳出3重循环 ";
                break 3;
            }
        }
        echo "绝对不会输出这里";
    }
}

echo "我是第三重";

// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP中断>php 1.break.php
// 0 1 2 3 4 5 6 7 i=7, 跳出1重循环
// 0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 i=15, 跳出3重循环 我是第三重

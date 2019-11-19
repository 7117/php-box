<?php

$arr = [
    0 => [
        'id' => 0,
        'title' => 'a',
        'serverTime' => 'b',
    ],
    1 => [
        'id' => 1,
        'title' => 'b',
        'serverTime' => 'a',
    ],
    2 => [
	    'id' => 2,
	    'title' => 'e',
	    'serverTime' => 'd',
	],
 
];
print_r($arr);

$timeKey =  array_column($arr,'serverTime');//取出数组中serverTime的一列，返回一维数组
array_multisort($timeKey,SORT_DESC,$arr);//排序，根据$serverTime 排序
print_r($arr);

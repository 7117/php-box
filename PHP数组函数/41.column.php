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
$key =  array_column($arr,'serverTime');//取出数组中serverTime的一列，返回一维数组
array_multisort($key,SORT_DESC,$arr);//排序，根据$serverTime 排序
print_r($arr);


$res['es_terminal_sold_out_rate'] = round(($res['qty_cum_end']/($res['qty_cum_end']+$res['in_inv']))*100,2);

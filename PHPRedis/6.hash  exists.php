<?php
//实例化redis
$redis = new Redis();
//连接
$redis->connect('127.0.0.1', 6379);
//字典
//批量设置多个key的值
$arr = [1 => 1, 2 => 2];
//检测hash中某个key知否存在
echo $redis->hexists('hash', '1');
echo PHP_EOL;
var_dump($redis->hexists('hash', 'cat'));
echo PHP_EOL;
print_r($redis->hgetall('hash'));
echo PHP_EOL;
//给hash表中key增加一个整数值
$redis->hincrby('hash', '1', 1);
print_r($redis->hgetall('hash'));
echo PHP_EOL;
//给hash中的某个key增加一个浮点值
$redis->hincrbyfloat('hash', 2, 1.3);
print_r($redis->hgetall('hash'));
echo PHP_EOL;


// bool(false)
//
// Array
// (
// )
//
// Array
// (
//     [1] => 1
// )
//
// Array
// (
//     [1] => 1
//     [2] => 1.3
// )
//

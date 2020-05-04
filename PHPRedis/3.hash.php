<?php
//实例化redis
$redis = new Redis();
//连接
$redis->connect('127.0.0.1', 6379);
//字典
//批量设置多个key的值
$arr = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];
$redis->hmset('hash', $arr);
print_r($redis->hgetall('hash'));
echo '<br>';
// 批量获得额多个key的值
$arr = [1, 2, 3, 5];
$hash = $redis->hmget('hash', $arr);
print_r($hash);
echo '<br>';
//检测hash中某个key知否存在
echo $redis->hexists('hash', '1');
echo '<br>';
var_dump($redis->hexists('hash', 'cat'));
echo '<br>';
print_r($redis->hgetall('hash'));
echo '<br>';
//给hash表中key增加一个整数值
$redis->hincrby('hash', '1', 1);
print_r($redis->hgetall('hash'));
echo '<br>';
//给hash中的某个key增加一个浮点值
$redis->hincrbyfloat('hash', 2, 1.3);
print_r($redis->hgetall('hash'));
echo '<br>';
//结果
// Array ( [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 )
// Array ( [1] => 1 [2] => 2 [3] => 3 [5] => 5 )
// 1
// bool(false)
// Array ( [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 )
// Array ( [1] => 2 [2] => 2 [3] => 3 [4] => 4 [5] => 5 )
// Array ( [1] => 2 [2] => 3.3 [3] => 3 [4] => 4 [5] => 5 )
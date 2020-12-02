<?php
//实例化redis
$redis = new Redis();
//连接
$redis->connect('127.0.0.1', 6379);


//批量设置多个key的值
$arr = ['uid' => 1, 'mobile' => 2];
$redis->hmset('token', $arr);
print_r($redis->hget('token','uid'));
echo PHP_EOL;
print_r($redis->hgetall('token'));
echo PHP_EOL;
print_r($redis->hmget('token',['uid','mobile']));

// 1
// Array
// (
//     [uid] => 1
//     [mobile] => 2
// )
//
// Array
// (
//     [uid] => 1
//     [mobile] => 2
// )

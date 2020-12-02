<?php
//实例化redis
$redis = new Redis();
//连接
$redis->connect('127.0.0.1', 6379);

$redis->hset('token', 'uid', '5');
print_r($redis->hget('token', 'uid'));
echo PHP_EOL;


// 5
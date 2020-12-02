<?php


$redis = new Redis();
$redis->connect('127.0.0.1', 6379);


$redis->lpush("tutorial-list", "Redis");
$redis->lpush("tutorial-list", "Mongodb");
$redis->lpush("tutorial-list", "Mysql");


$arList = $redis->lrange("tutorial-list", 0 ,-1);


print_r($arList);

<?php


$redis = new \Redis();
$redis->connect('127.0.0.1', 6379);


$redis->set("tutorial-name", "Redis tutorial");
echo $redis->get("tutorial-name");
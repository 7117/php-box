<?php
//实例化redis
$redis = new Redis();
//连接
$redis->connect('127.0.0.1', 6379);
//有序集合
//添加元素
echo $redis->zadd('set', 1, 'cat');echo '<br>';
echo $redis->zadd('set', 2, 'dog');echo '<br>';
echo $redis->zadd('set', 3, 'fish');echo '<br>';
echo $redis->zadd('set', 4, 'dog');echo '<br>';
echo $redis->zadd('set', 4, 'bird');echo '<br>';
//返回集合中的所有元素
print_r($redis->zrange('set', 0, -1));echo '<br>';
print_r($redis->zrange('set', 0, -1, true));echo '<br>';
//返回元素的score值
echo $redis->zscore('set', 'dog');echo '<br>';
//返回存储的个数
echo $redis->zcard('set');echo '<br>';
//删除指定成员
$redis->zrem('set', 'cat');
print_r($redis->zrange('set', 0, -1));echo '<br>';
//返回集合中介于min和max之间的值的个数
print_r($redis->zcount('set', 3, 5));echo '<br>';
//返回有序集合中score介于min和max之间的值
print_r($redis->zrangebyscore('set', 3, 5));echo '<br>';
print_r($redis->zrangebyscore('set', 3, 5, ['withscores'=>true]));echo '<br>';
//返回集合中指定区间内所有的值
print_r($redis->zrevrange('set', 1, 2));echo '<br>';
print_r($redis->zrevrange('set', 1, 2, true));echo '<br>';
//有序集合中指定值的socre增加
echo $redis->zscore('set', 'dog');echo '<br>';
$redis->zincrby('set', 2, 'dog');
echo $redis->zscore('set', 'dog');echo '<br>';
//移除score值介于min和max之间的元素
print_r($redis->zrange('set', 0, -1, true));echo '<br>';
print_r($redis->zremrangebyscore('set', 3, 4));echo '<br>';
print_r($redis->zrange('set', 0, -1, true));echo '<br>';
//结果
// 1
// 0
// 0
// 0
// 0
// Array ( [0] => cat [1] => fish [2] => bird [3] => dog )
// Array ( [cat] => 1 [fish] => 3 [bird] => 4 [dog] => 4 )
// 4
// 4
// Array ( [0] => fish [1] => bird [2] => dog )
// 3
// Array ( [0] => fish [1] => bird [2] => dog )
// Array ( [fish] => 3 [bird] => 4 [dog] => 4 )
// Array ( [0] => bird [1] => fish )
// Array ( [bird] => 4 [fish] => 3 )
// 4
// 6
// Array ( [fish] => 3 [bird] => 4 [dog] => 6 )
// 2
// Array ( [dog] => 6 )

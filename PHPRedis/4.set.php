<?php
//实例化redis
$redis = new Redis();
//连接
$redis->connect('127.0.0.1', 6379);
//集合
$redis->sadd('set', 'horse');
$redis->sadd('set', 'cat');
$redis->sadd('set', 'dog');
$redis->sadd('set', 'bird');
$redis->sadd('set2', 'fish');
$redis->sadd('set2', 'dog');
$redis->sadd('set2', 'bird');
print_r($redis->smembers('set'));echo '<br>';
print_r($redis->smembers('set2'));echo '<br>';
//返回集合的交集
print_r($redis->sinter('set', 'set2'));echo '<br>';
//执行交集操作 并结果放到一个集合中
$redis->sinterstore('output', 'set', 'set2');
print_r($redis->smembers('output'));echo '<br>';
//返回集合的并集
print_r($redis->sunion('set', 'set2'));echo '<br>';
//执行并集操作 并结果放到一个集合中
$redis->sunionstore('output', 'set', 'set2');
print_r($redis->smembers('output'));echo '<br>';
//返回集合的差集
print_r($redis->sdiff('set', 'set2'));echo '<br>';
//执行差集操作 并结果放到一个集合中
$redis->sdiffstore('output', 'set', 'set2');
print_r($redis->smembers('output'));echo '<br>';
// 结果
// Array ( [0] => cat [1] => dog [2] => bird [3] => horse )
// Array ( [0] => bird [1] => dog [2] => fish )
// Array ( [0] => bird [1] => dog )
// Array ( [0] => dog [1] => bird )
// Array ( [0] => cat [1] => dog [2] => bird [3] => horse [4] => fish )
// Array ( [0] => cat [1] => dog [2] => bird [3] => horse [4] => fish )
// Array ( [0] => horse [1] => cat )
// Array ( [0] => horse [1] => cat )

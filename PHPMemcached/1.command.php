<?php
$mem = new Memcache;

if (!$mem->connect("127.0.0.1", 11211)) {
    echo "f" . PHP_EOL;
} else {
    echo 't' . PHP_EOL;
}

$res = $mem->set('a', 'a');
$res = $mem->set('b', 'a');
$res = $mem->get('a');
$info = $mem->delete('b');
var_dump($res);
var_dump($info);
echo "<br>";


$res = $mem->set('c', 'c', MEMCACHE_COMPRESSED);
$res = $mem->get('c');
var_dump($res);
echo "<br>";


$res = $mem->set('d', 'd', 0, 5);
var_dump($mem->get('d'));
echo "<br>";

//add相当于redis的setnx  没有设置key的时候进行设置
$res = $mem->add('d', '3', 0, 5);
var_dump($mem->get('3'));
echo "<br>";


$res = $mem->replace('d', 'e', 0, 5);
var_dump($mem->get('d'));

$res = $mem->set('f', 10);
$res = $mem->increment('f', 10);
echo $res . "<br>";


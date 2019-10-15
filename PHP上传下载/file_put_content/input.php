<?php
$file = 'a.txt';

$site = "Google";
// 向文件追加写入内容
// 使用 FILE_APPEND 标记，可以在文件末尾追加内容
//  LOCK_EX 标记可以防止多人同时写入
file_put_contents(__DIR__.'/a.txt', $site, FILE_APPEND | LOCK_EX);

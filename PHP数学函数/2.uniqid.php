<?php

// 第一个参数是随机的前缀
// 第二个参数是雀 使得更加的唯一
echo uniqid();
echo "<br>";
echo uniqid(mt_rand(),true);
echo "<br>";
echo mt_rand();


// 5d9c6c8a47d4a
// 10020744795d9c6c8a47d519.15961326
// 2059468050

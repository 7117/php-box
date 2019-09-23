<?php

$chars = 'abcdefghigklmnopqrstuvwxyz';
echo $chars[8];
echo "<br>";
$salt = '';
for ($i = 0;$i < 16 ; $i++) {
    $salt.=$chars[mt_rand(0,strlen($chars)-1)];
    var_dump(gettype($chars));
    echo "<br>";
    var_dump(gettype($salt));
}
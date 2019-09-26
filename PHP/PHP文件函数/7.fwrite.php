<?php

$a=fopen("ddd.php","w");
$aaa="aaa";
fwrite($a,$aaa);
fwrite($a,$aaa);
fwrite($a,$aaa);
fclose($a);
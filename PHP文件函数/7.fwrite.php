<?php
$dir=__DIR__."\\";
$open=fopen("$dir".'rrr.php',"w");
$str="bbb\r\n";

fwrite($open,$str);
fwrite($open,$str);
fwrite($open,$str);

fclose($open);
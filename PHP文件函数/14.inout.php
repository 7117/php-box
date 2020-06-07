<?php
$handle = fopen("php://stdin", "r");
$s = fgets($handle);
print_r($s);
fclose($handle);

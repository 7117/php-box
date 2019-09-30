<?php
echo ini_get('display_errors');
echo '<br>';

ini_set('display_errors', '1');
echo '<br>';

$a=ini_get_all();
print_r($a);
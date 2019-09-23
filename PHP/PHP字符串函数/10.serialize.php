<?php
$sites = array('Google', 'Runoob', 'Facebook');

$a=serialize($sites);
print_r($a);
echo '<br>';

$b=unserialize($a);
print_r($b);
echo '<br>';

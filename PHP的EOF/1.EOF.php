<?php

$name="aaaa";
$b=<<<EOF
<p><b>"aaa"$name</b></p>
EOF;

echo $b;
echo "<br>";

$c="bbbb";
$d=<<<EOF
<span>"1111111"</span>
EOF;

var_dump($d);
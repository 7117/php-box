<?php

$a=[
    "a"=>1,
    "b"=>2,
    "c"=>3,
];

// {"a":"1","b":"2","c":"3"}
echo json_encode($a);
echo "<br>";
echo serialize($a);
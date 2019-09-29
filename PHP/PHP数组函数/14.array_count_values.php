<?php
$a=[
    1,1,2,2,5,5,7,9
];

$b=array_count_values($a);
print_r($b);


// ARRAY([1] = > 2[2] = > 2[5] = > 2[7] = > 1[9] = > 1)
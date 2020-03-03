<?php

// {"a":1,"b":2,"c":3}
// a:3:{s:1:"a";i:1;s:1:"b";i:2;s:1:"c";i:3;}
$a = array(
    "a" => 1,
    "b" => 2,
    "c" => 3,
);
echo json_encode($a);
echo "-----";
echo serialize($a);

// [{"a":1,"b":2,"c":3}]
// a:1:{i:0;a:3:{s:1:"a";i:1;s:1:"b";i:2;s:1:"c";i:3;}}
echo "<br>";
$a = array(
    array(
        "a" => 1,
        "b" => 2,
        "c" => 3,
    )
);


echo json_encode($a);
echo "-----";
echo serialize($a);

// [[{"a":1,"b":2,"c":3}]]
// a:1:{i:0;a:1:{i:0;a:3:{s:1:"a";i:1;s:1:"b";i:2;s:1:"c";i:3;}}}
echo "<br>";
$a = array(
    array(
        array(
            "a" => 1,
            "b" => 2,
            "c" => 3,
        )
    )
);

echo json_encode($a);
echo "-----";
echo serialize($a);
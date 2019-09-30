<?php
$a=['a','v','f','f','e'];
$vv=array_fill_keys($a,"aaa");
var_dump($vv);

// array(4) {
//     ["a"]=&gt;
//     string(3) "aaa"
//     ["v"]=&gt;
//   string(3) "aaa"
//     ["f"]=&gt;
//   string(3) "aaa"
//     ["e"]=&gt;
//   string(3) "aaa"
// }

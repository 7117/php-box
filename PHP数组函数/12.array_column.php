<?php
$a=[
    'a'=>'aaa',
    'b'=>'aaa',
    'c'=>'aaa',
    'd'=>'aaa',
    'e'=>'aaa',
    'f'=>'aaa',
];

$a=array_chunk($a,2);
var_dump($a);

// array(3) {
//     [0]=&gt;
//     array(2) {
//         [0]=&gt;
//         string(3) "aaa"
//         [1]=&gt;
//     string(3) "aaa"
//   }
//   [1]=&gt;
//   array(2) {
//         [0]=&gt;
//         string(3) "aaa"
//         [1]=&gt;
//     string(3) "aaa"
//   }
//   [2]=&gt;
//   array(2) {
//         [0]=&gt;
//         string(3) "aaa"
//         [1]=&gt;
//     string(3) "aaa"
//   }
// }

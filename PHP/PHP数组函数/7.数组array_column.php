<?php

$a = [
  [
    'id' => 5698,
    'first_name' => 'Peter',
    'last_name' => 'Griffin',
  ],
  [
    'id' => 4767,
    'first_name' => 'Ben',
    'last_name' => 'Smith',
  ],
  [
    'id' => 3809,
    'first_name' => 'Joe',
    'last_name' => 'Doe',
  ]
];

$b=array_column($a, 'first_name');
print_r($b);


// array_column的使用必须是二维数组哦！！！！
$a = [[
    'id' => 5698,
    'first_name' => 'Peter',
    'last_name' => 'Griffin',
 ]];
echo "<br>";
$b=array_column($a, 'first_name');
print_r($b);
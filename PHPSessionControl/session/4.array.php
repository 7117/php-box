<?php
session_start();

$a=[
    'q'=>['a'=>'a','b'=>'b'],
    'p'=>['a'=>'a','b'=>'b'],
];

$_SESSION=$a;

print_r($_SESSION);
<?php
//数组对象都可以转化为json
//数组是键对应值
//对象是属性对应值
$a=[
    1=> 'a',2=>'b',3=>'c',4=>'d',5=>'e'
];

$a=json_encode($a);
var_dump($a);



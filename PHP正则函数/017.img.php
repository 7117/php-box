<?php

$reg = '/<img src=".+" [^>]*/';
$str = '<img src="https://profile.csdnimg.cn/0/9/7/3_fujian9544" class="avatar_pic" username="fujian9544">';
preg_match($reg, $str, $con);
var_dump($con);
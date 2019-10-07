<?php

include "validate.php";

$user=$_COOKIE['username'];
var_dump("这里是信息详情页面");
echo "<br>";
var_dump("您已经登录,亲爱的您，{$user}");
<?php
$memberInfo = array();
$memberInfo['username'] = "eric";
$memberInfo['truename'] = "袁明贺";
$memberInfo['age'] = 25;
$memberInfo['imooc'] = "http://www.imooc.com";
$memberInfo['hobby']['one'] = "developer";
$memberInfo['hobby']['two'] = "coding";
$memberInfo['hobby']['three'] = "学习";
echo json_encode($memberInfo);

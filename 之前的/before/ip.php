<?php
// 客户端
$ipone=$_SERVER['REMOTE_ADDR'];
var_dump('最后一个代理IP：'.$ipone);

// 因为没有使用多个代理（127.0.0.1表示监视本地）所以不会显示数值 
echo '<br>';
@$iptwo=$_SERVER['HTTP_X_FORWARDED_FOR '];
var_dump('客户端真实IP：'.$iptwo);

// 因为只是本地循环回路测试  所以为空
@$ipthr=$_SERVER["HTTP_CLIENT_IP "];
echo '<br>';
var_dump('代理服务器IP'.$ipthr);

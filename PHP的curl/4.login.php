<?php

$data='email=15600271767&password=h689qai2010';
$ch = curl_init();	// 初始化

curl_setopt($ch, CURLOPT_URL, "http://www.imooc.com/user/newlogin");	// 设置访问网页的URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	// 执行之后不直接打印出来
// Cookie相关设置，这部分设置需要在所有会话开始之前设置
date_default_timezone_set('PRC'); // 使用Cookie时，必须先设置时区
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  //不使用认证
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  //不使用认证
curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); // 这样能够让cURL支持页面链接跳转

curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookiefile');
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookiefile');
curl_setopt($ch, CURLOPT_COOKIE, session_name() . '=' . session_id());
curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER,
    array(
        "application/x-www-form-urlencoded; charset=utf-8",
        "Content-length: ".strlen($data)
));

curl_setopt($ch, CURLOPT_URL, "http://www.imooc.com/user/oplog");
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: text/xml"
));

$output=curl_exec($ch);	// 执行
curl_close($ch);	// 关闭cURL
echo $output;

<?php
/**
 * 下载网络上面的一个HTTPS的资源
 */

//初始化
$curlobj = curl_init();
//地址
curl_setopt($curlobj, CURLOPT_URL, "https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.js");		// 设置访问网页的URL
// 执行之后不直接打印出来
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);

// 设置HTTPS支持
date_default_timezone_set('PRC'); // 使用Cookie时，必须先设置时区
// 终止服务器验证
curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlobj, CURLOPT_SSL_VERIFYHOST, 2);

$output=curl_exec($curlobj);	// 执行
curl_close($curlobj);			// 关闭cURL
echo $output;


<?php

$URL="http://www.yoururl.com/bbs/login.asp?action=chk";
//填入论坛的登陆页面地址
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$URL);
curl_setopt($ch,CURLOPT_REFERER,"http://www.hxfoods.com/bbs/login.asp");
//设置，访问页面的来源地址
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,'username=→→敢死队→&password=168168');
//分析登陆页面，把用户名，密码分别对应起来
curl_setopt ($ch, CURLOPT_HEADER,true);
//使能显示http头，
curl_exec($ch);
if (curl_errno($ch))
{
    print curl_error($ch);
}
else
{
    curl_close($ch);
}
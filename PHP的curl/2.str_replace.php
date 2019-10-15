<?php

$curl=curl_init();

curl_setopt($curl,CURLOPT_URL,"http://www.baidu.com/");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

$res=curl_exec($curl);

echo str_replace("百度","摆渡",$res);
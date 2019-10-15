<?php
/**
 * 通过调用WebService查询北京的当前天气
 */
$data = 'theCityName=beijing';
//初始化
$curl = curl_init();
//请求url
curl_setopt($curl, CURLOPT_URL, "http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName");
//启用时会将头文件的信息作为数据流输出
curl_setopt($curl, CURLOPT_HEADER, 0);
//要转存  参数为1表示$html 要手动输出,为0表示echo $html
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//设置post方式
curl_setopt($curl, CURLOPT_POST, 1);
//设置post数据
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//设置一个header中传输内容的数组。
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "application/x-www-form-urlencoded;charset=utf-8",
        "Content-length: ".strlen($data)
));
//设置user-agent 在HTTP请求中包含一个"user-agent"头的字符串
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$rtn = curl_exec($curl);

//判错
if(!curl_error($curl)){
    echo $rtn;
}else{
    echo curl_error();
}

curl_close($curl);

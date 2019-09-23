<?php
//获取文件名  取出单引号  完善文件名
$filename = $_GET['filename'];
$filename=trim($filename,"'");
$filename = $filename.'.zip'; //获取文件名称

// header:主机名文件名  下载
$host_addr = $_SERVER['HTTP_HOST'].'/'; //当前域名
header('location:http://'.$host_addr.$filename);

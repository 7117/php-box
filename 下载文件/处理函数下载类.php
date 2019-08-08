<?php 
$filename=$_GET['filename'];
// 指定文件
header('content-disposition:attachment;filename='.basename($filename));
// 指定大小
header('content-length:'.filesize($filename));
// 读取文件
readfile($filename);
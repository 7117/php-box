<?php
/**
 * Created by PhpStorm.
 * User: sunxi
 * Date: 2019/9/23
 * Time: 18:15
 */
$file_name='d.zip';
header("Cache-Control: max-age=0");
header("Content-Description: File Transfer");
header('Content-disposition: attachment; filename=' . basename($file_name)); // 文件名
header("Content-Type: application/zip"); // zip格式的
header("Content-Transfer-Encoding: binary"); // 告诉浏览器，这是二进制文件
header('Content-Length: ' . filesize($file_name)); // 告诉浏览器，文件大小
@readfile($file_name);//输出文件;
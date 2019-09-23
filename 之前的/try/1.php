<?php

session_start();

//创建随机码
for($i=0;$i<4;$i++){
    $_nmsg .= dechex(mt_rand(0, 15));
}

//保存在session里
$_SESSION['code'] = $_nmsg;

//长和高
$_width = 75;
$_height = 25;
//创建图像
$_img = imagecreatetruecolor($_width, $_height);
$_white = imagecolorallocate($_img, 255, 255, 255);
imagefill($_img, 0, 0, $_white);

//创建黑色边框
$_black = imagecolorallocate($_img, 100, 100, 100);
imagerectangle($_img, 0, 0, $_width-1, $_height-1, $_black);

//随机划线条
for ($i=0;$i<6;$i++) {
	$_rnd_color= imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
	imageline($_img,mt_rand(0,75),mt_rand(0,25),mt_rand(0,75),mt_rand(0,25),$_rnd_color);
}
//随机打雪花
for ($i=1;$i<100;$i++) {
	imagestring($_img,1,mt_rand(1,$_width),mt_rand(1,$_height),"*",
		imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255)));
}
//输出验证码
for ($i=0;$i<strlen($_SESSION['code']);$i++){
	imagestring($_img,mt_rand(3,5),$i*$_width/4+mt_rand(1,10),
		mt_rand(1,$_height/2),$_SESSION['code'][$i],
		imagecolorallocate($_img,mt_rand(0,150),mt_rand(0,100),mt_rand(0,150)));
}

//输出图像
ob_clean(); 
header('Content-Type:image/png');
imagepng($_img);
//销毁
imagedestroy($_img);

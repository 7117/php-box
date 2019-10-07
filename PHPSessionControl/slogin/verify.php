<?php
/**
 * 生成验证码
 * @param integer $type 类型0：纯数字 类型1：字母 类型2：数字+字母
 * @param integer $length 验证码长度
 * @param integer $width 画布宽度
 * @param integer $height 画布高度
 * @return string 验证码字符串
 */
function generateVerify($type=2, $length=4, $width=100, $height=30) {
    // 新建一个真彩色图像
    $image = imagecreatetruecolor($width, $height);
    // 为一副图像分配颜色
    $white = imagecolorallocate($image, 255, 255, 255);
    // 画一矩形并填充
    imagefilledrectangle($image, 0, 0, $width, $height, $white);

    function randColor($image) {
        return imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }

    switch($type) {
        // 产生随机数字
        case 0:
            $str = join('', array_rand(range(0,9)), $length);
            break;
        // 产生随机字母
        case 1:
            $str = join('', array_rand(array_flip(array_merge(range('a', 'z'), range('A', 'Z'))), $length));
        // 产生随机数字字母
        case 2:
            $str = join('', array_rand(array_flip(array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'))), $length));
    }

    //  用 TrueType 字体向图像写入文本
    for($i=0;$i<$length;$i++) {
        imagettftext($image, 16, mt_rand(-30, 30), $i*($width/$length), mt_rand($height-15, 25), randColor($image), 'D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPSessionControl\slogin\Microsoft-YaHei-Light.ttc', $str[$i]);
    }

    // 生成像素点
    for ($i=1;$i<=100;$i++) {
        imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), randColor($image));
    }

    //输出图像
    header('Content-type:image/png');
    imagepng($image);
    imagedestroy($image);

    return $str;
}
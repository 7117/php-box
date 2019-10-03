<?php
//判断错误是没有的
if($_FILES['file']['error']!=1){
    $a=$_FILES['file'];
    print_r($a);
    $nowsite="D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP文件函数\uplod\\";
    if(!file_exists($nowsite)){
        mkdir($nowsite,0777);
        chmod($nowsite,0777);
        echo "success";
        echo "<br>";
    }
    echo "ddd";
    echo "<br>";
    move_uploaded_file($_FILES['file']['tmp_name'],$nowsite."ssss.txt");
}
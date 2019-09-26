<?php
echo "<br>";
echo "111";
if($_FILES['file']['error']!=1){
    echo "aaaa";
    echo "<br>";
    $a=$_FILES['file'];
    print_r($a);
    $nowsite="D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件函数\uplod";
    if(!file_exists($nowsite)){
        mkdir($nowsite);
        chmod($nowsite,0777);
        echo "success";
        echo "<br>";
    }
    echo "<br>";
    echo "ddd";
    echo "<br>";
    move_uploaded_file($_FILES['file']['tmp_name'],$nowsite."\\"."ssss.tmp");
}
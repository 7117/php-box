<?php
$conn=new mysqli('locahost','root','root','onecms');
if($conn){
    echo "连接成功";
    echo "<br>";
}else{
    echo "连接失败";
    echo "<br>";
}

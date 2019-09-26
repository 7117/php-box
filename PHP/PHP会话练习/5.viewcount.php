<?php
session_start();

if(isset($_SESSION['viewcount'])){
    $_SESSION['viewcount']=$_SESSION['viewcount']+1;
}else{
    $_SESSION['viewcount']=1;
}
var_dump($_SESSION['viewcount']);
//销毁的方式也可以采用cookie的销毁方式
//unset($_SESSION['viewcount']);
session_destroy();
//setcookie("PHPSESSID","",time()-1);


?>
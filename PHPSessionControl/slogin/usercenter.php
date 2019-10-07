<?php
session_start();

if(empty($_SESSION['username'])){
    exit("<script>
        alert('dologin');
        window.location.href='login.php';
    </script>");
}

?>


<div>欢迎您，<?php echo $_SESSION['username'];?></div>
<div><a href="doLogin.php?act=logout">注销</a></div>


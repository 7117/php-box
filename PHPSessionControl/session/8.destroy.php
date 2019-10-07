<?php

session_start();

$_SESSION=[];

if(ini_get("session.use_cookies")){
    $para=session_get_cookie_params();

    setcookie(session_name(),'',time()-1,$para['path'],$para['domain'],$para['secure'],$para['httponly']);
}

session_destroy();
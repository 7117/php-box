<?php

$authorization = false;

if($_SERVER['PHP_AUTH_USER'] == "aa" && $_SERVER['PHP_AUTH_PW'] == "aa"){
    echo "login";
    $authorization = true;
    exit;
}

if(!$authorization){
    header("WWW-Authenticate:Basic");
    header('HTTP/1.0 401 Unauthorized');
    print "You are unauthorized to enter this area.";
}
?>
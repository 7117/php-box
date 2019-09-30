<?php

$to = "862890248@qq.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "sunxiao789@foxmail.com";
$headers = "From: $from";
mail($to,$subject,$message,$headers);
echo "Mail Sent.";


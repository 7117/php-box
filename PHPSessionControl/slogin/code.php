<?php

require 'verify.php';
session_start();
$_SESSION['verify']=generateVerify();

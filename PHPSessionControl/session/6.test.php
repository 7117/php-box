<?php
// http://aa.aa.aa/PHPSessionControl/session/6.test.php?PHPSESSID=2njsrsg3e5u0uvsrsde809e8bl
session_id($_GET[session_name()]);
session_start();

print_r($_SESSION);

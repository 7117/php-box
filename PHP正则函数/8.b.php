<?php

$str='what is this?';
$reg="/\bis\b/";
$aa=preg_match($reg,"was",$str);
var_dump($aa);
<?php

$filename = 'file.txt';

$file = fopen($filename, 'r');

//Header("Expires: 0");
//
//Header("Pragma: public");
//
//Header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//
//Header("Cache-Control: public");
//
//Header("Content-Length: ". filesize($filename));
//
Header("Content-Type: application/octet-stream");
//
Header("Content-Disposition: attachment; filename=".$filename);

readfile($filename);

<?php

$reg = '/<a[^>]*href="([^"]*)"/us';

$str = '<a href="question.html">OOP是什么意思？</a><a href="question.html">今天为什么这么冷？</a><a href="question.html">为什么买了一斤包子	？</a>';

preg_match_all($reg, $str, $con);

var_dump($con);

//
// D:\phpstudy\PHPTutorial\WWW\phpCollection\PHP正则函数\020.title.php:9:
// array (size=2)
//   0 =>
//     array (size=3)
//       0 => string '<a href="question.html"' (length=23)
//       1 => string '<a href="question.html"' (length=23)
//       2 => string '<a href="question.html"' (length=23)
//   1 =>
//     array (size=3)
//       0 => string 'question.html' (length=13)
//       1 => string 'question.html' (length=13)
//       2 => string 'question.html' (length=13)
<?php

include_once "d.php";
require_once "d.php";

include "d.php";
require "d.php";

include "a.php";
require "a.php";

// int(1111) int(1111) int(1111) 
// Warning: include(a.php): failed to open stream: No such file or directory in D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件\1.include.php on line 9

// Warning: include(): Failed opening 'a.php' for inclusion (include_path='.;C:\php\pear') in D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件\1.include.php on line 9

// Warning: require(a.php): failed to open stream: No such file or directory in D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件\1.include.php on line 10

// Fatal error: require(): Failed opening required 'a.php' (include_path='.;C:\php\pear') in D:\phpstudy\PHPTutorial\WWW\CodePractice\PHP\PHP文件\1.include.php on line 10


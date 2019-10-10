<?php
//
// class test{
//     public static $aa="我是谁";
//
//     public static function bb(){
// // ( ! ) Fatal error: Uncaught Error: Attempt to unset static property test::$aa in D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP变量\9.class static.php on line 7
//         unset(test::$aa);
//     }
//
//     public function cc(){
//         unset(test::$aa);
//     }
// }
//
// unset(test::$aa);
// //函数外部的销毁测试
// //赋值
// // D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP变量\9.class static.php:12:string '我是谁' (length=9)
// var_dump($aa);
// unset($aa);
// //销毁了
// // ( ! ) Notice: Undefined variable: aa in D:\phpection\PHP变量\9.class static.php on line 15
// // D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP变量\9.class static.php:15:null
// var_dump($aa);
//
// test::bb();

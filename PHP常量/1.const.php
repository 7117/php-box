<?php
//define可以正常的使用     
//string(4) "aaaa"
if(1){
    define("aaaa","aaaa");
    var_dump(aaaa);
}

// if(1){
//     // 不期望的const  说明不能再里面使用const
//     // Parse error: syntax error, unexpected 'const' (T_CONST) in
//     // D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP常量\1.const.php on line 9
//     const aaaa="aaaa";
//     var_dump(aaaa);
// }


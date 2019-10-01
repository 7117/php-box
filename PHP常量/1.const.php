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

class  aaaa{
    const ddd="2222";

    public function aaa(){
        // const aasssa="aaasssss";
        // var_dump(aasssa);
    }
}
//方法一：在类里面常量被视作静态属性
$a=aaaa::ddd;
echo "<br>";
var_dump($a);
echo "<br>";
//方法二：
$fff=new aaaa();
const ddd="这个是自己定义的常量eeeee";
@var_dump(ddd);


// $aaasssss=$fff->aaa();
// var_dump($aaasssss);


const BIT_5 = 1 << 5;// 在PHP5.6之后有效，之前无效
define('BIT_6', 1 << 5); // 一直有效
echo "<br>";
echo "11111111111111111111111111";
var_dump(BIT_5);
var_dump(BIT_6);

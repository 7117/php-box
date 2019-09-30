<?php
//empty(空对象)
//返回false  empty(空对象)为错 也就是空对象empty判断不为空
class aaaa{

}
$a=new aaaa();
if(empty($a)){
    var_dump(empty($a));
    echo "<br>";
    echo "无属性与方法的对象为空";
}else{
    var_dump(empty($a));
    echo "<br>";
    echo "无属性与方法的对象不为空";
}


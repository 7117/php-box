<?php
// class aa bb是用来测试final方法的
class aa{
    public $aa="aa";

    final public function  bb(){
        echo "bb";
    }
}

class cc extends aa{
// 不能被重写哈！！！！
// Fatal error: Cannot override final method aa::bb() in D:\phpstudy\PHPTutoria
//l\WWW\PHPCollection\PHP的final\1.final.php on line 15
    public function bb(){
        echo "bbb";
    }
}


//class cc tt是用来测试类的继承的
final class cc{
    public function ff(){
        echo "aa";
    }
}
// Fatal error: Class tt may not inherit from final
// class (cc) in D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP的final\1.final.php on line 29
class tt extends cc{
    public function rr(){
        echo "rr";
    }
}
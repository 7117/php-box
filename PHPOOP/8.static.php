<?php

// * 1. 静态属性用于保存类的公有数据,使得类的对象static属性一致
// * 2. 静态方法里面只能访问静态属性
// * 3. 静态成员不需要实例化对象就可以访问
// * 4. 类内部，可以通过self或者static关键字访问自身的静态成员
// * 5. 可以通过parent关键字访问父类的静态成员
// * 6. 可以通过类名称在外部访问类的静态成员

class a{
    public $name;

    public static function run(){
        echo "run";
    }
}

class b extends a{
    public $age;

    public static function jump(){
        parent::run();
    }
}
b::jump();


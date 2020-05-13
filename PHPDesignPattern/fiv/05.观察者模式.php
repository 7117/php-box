<?php
// 主题接口
interface Subject{
    public function register(Observer $observer);
    public function notify();
}
// 观察者接口
interface Observer{
    public function watch();
}
// 主题
class Action implements Subject{
    public $_observers=array();
    public function register(Observer $observer){
        $this->_observers[]=$observer;
    }

    public function notify(){
        foreach ($this->_observers as $observer) {
            $observer->watch();
        }

    }
}

// 观察者
class Cat implements Observer{
    public function watch(){
        echo "Cat watches TV<hr/>";
    }
}
class Dog implements Observer{
    public function watch(){
        echo "Dog watches TV<hr/>";
    }
}
class People implements Observer{
    public function watch(){
        echo "People watches TV<hr/>";
    }
}



// 应用实例
$action=new Action();
$action->register(new Cat());
$action->register(new People());
$action->register(new Dog());
$action->notify();
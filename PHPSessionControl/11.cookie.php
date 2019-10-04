<?php

class Cookie{
    private $expire=0;
    private $path='';
    private $domain='';
    private $secure=false;
    private $httponly=false;
    //一私：私有属性 进行保存
    private static $_instance=null;

    //一私：防止被继承使用
    private function __construct($options=[]){
        $this->setOptions($options);
    }
    //一私：防止对象被克隆
    private function __clone(){

    }
    //一公：对象调用的方法，进行实例化对象
    public static function getInstance($options=[]){
        if(is_null(self::$_instance)){
            $class=__CLASS__;
            self::$_instance=new $class($options);
        }

        return self::$_instance;
    }

    //外部设置
    public function set($name,$value,$options){
        if(is_array($options) && count($options)>0){
            $this->setOptions($options);
        }
        $value=json_encode($value);
        setcookie($name,$value,$this->expire,$this->path,$this->domain,$this->secure,$this->httponly);
    }
    //外部调用
    public function get($name){
        if(isset($_COOKIE)){
            $res=json_decode($_COOKIE[$name]);
            return print_r($res);
        }
    }
    //外部调用
    public function listAll(){
        if(isset($_COOKIE)){
            foreach($_COOKIE as $k=>$v){
                var_dump($k.'=>'.$v);
                echo '<br>';
            }
        }
    }
    //外部调用
    public function delete($name,$options=[]){
        if(isset($_COOKIE)){
            $this->expire=time()-1;
            $this->set($name,'',$options);
        }
    }
    //外部调用
    public function deleteAll(){
        if(isset($_COOKIE)){
            foreach($_COOKIE as $k=>$v){
                setcookie($k,'',$this->expire,$this->path,$this->domain,$this->secure,$this->httponly);
                unset($_COOKIE[$k]);
            }
        }
    }

    public function setOptions($options=[]){
        if(isset($options['expire'])){
            $this->expire=(int)$options['expire'];
        }
        if(isset($options['path'])){
            $this->path=$options['path'];
        }
        if(isset($options['domain'])){
            $this->domain=$options['domain'];
        }
        if(isset($options['secure'])){
            $this->secure=$options['secure'];
        }
        if(isset($options['httponly'])){
            $this->httponly=$options['httponly'];
        }
        return $this;
    }
}

$test=['a'=>"aaa",'b'=>"bbb"];
$cookie=Cookie::getInstance();
$cookie->set("cookie1",$test,["expire"=>time()+24*3600,"path"=>'/']);
$cookie->set("cookie2",$test,["expire"=>time()+24*3600,"path"=>'/']);
$cookie->get("cookie1");
$cookie->get("cookie2");
$cookie->listAll();
// $cookie->delete("cookie");
// $cookie->deleteAll();
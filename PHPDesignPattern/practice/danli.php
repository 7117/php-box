<?php

class Single{
    private static $var;

    private function __construct(){

    }

    private function __call(){

    }

    public static function getInstance(){

        if(self::$var instanceof self){
            return self::$var;
        }else{
            self::$var =new Self();
            return self::$var;
        }
    }
}
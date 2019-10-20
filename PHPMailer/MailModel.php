<?php

include __DIR__.'/vendor/autoload.php';

use Nette\Mail\Message;

class MailModel{
    public $error=0;
    public $errmsg="";
    public $pdo=null;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=test1", "root", "root",
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $this->pdo->query("set names utf8");
    }

    public function send($id,$title,$contents){
        $sql="select * from email where id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $email=$data[0]['email'];

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return "邮箱格式不对";
        }

    }
}
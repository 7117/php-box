<?php

namespace PHPMailer;

use Nette\Mail\Message;

class MailModel{
    public $error=0;
    public $conn=null;

    public function __construct(){

        $this->conn=mysqli_connect("localhost","root","root","test1");
    }

    public function send($id,$title,$contents){
        $sql="select * from email where id=$id";
        $res=mysqli_query($this->conn,$sql);
        $res=mysqli_fetch_assoc($res);
        $addr=$res['email'];

        if(!filter_var($addr,FILTER_VALIDATE_EMAIL)){
            return "邮箱格式不对";
        }

        $mail=new Message();
        $mail->setFrom('孙潇 <sunxiao789@foxmail.com>')
            ->addTo($addr)
            ->setSubject($title)
            ->setBody($contents);

        $mailer = new Nette\Mail\SmtpMailer([
            'host' => 'smtp.qq.com',
            'username' => '862890248@qq.com',
            'password' => 'hhhh6666', /* smtp独立密码 */
            'secure' => 'ssl',
        ]);
        $rep = $mailer->send($mail);
        return true;

    }
}
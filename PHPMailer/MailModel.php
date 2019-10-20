<?php

namespace PHPMailer;

use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

class MailModel{
    public $error=0;
    public $conn=null;

    public function __construct(){

        $this->conn=mysqli_connect("localhost","root","root","test1");
    }

    public function send($id,$title,$contents){
        header("Content-type: text/html; charset=utf-8");
        $sql="select * from email where id=$id";
        $res=mysqli_query($this->conn,$sql);
        $res=mysqli_fetch_assoc($res);
        $addr=$res['email'];

        if(!filter_var($addr,FILTER_VALIDATE_EMAIL)){
            return "邮箱格式不对";
        }

        $mail=new Message();
        $mail->setFrom('孙潇 <jimsun7117@163.com>')
            ->addTo($addr)
            ->setSubject($title)
            ->setBody($contents);

        $mailer = new SmtpMailer([
            'host' => 'smtp.163.com',
            'username' => 'jimsun7117@163.com',
            'password' => 'jim7117', /* smtp独立密码 */
            'secure' => 'ssl',
        ]);

        $rep = $mailer->send($mail);
        return true;

    }
}
<?php
include "MailModel.php";

use PHPMailer\MailModel;

class MailController
{

    public function sendAction()
    {
        // 获取参数
        $id = 1;
        $title = "邮件的标题";
        $contents = "邮件的内容";

        if (!$id || !$title || !$contents) {
            echo "失败1";
            die();
        }


        $model = new MailModel();

        if ($model->send(intval($id),trim($title),trim($contents))){
            echo "成功";
            die();
        }else{
            echo "失败2";
            die();
        }

    }
}

$test=new MailController();
$test->sendAction();
<?php

class MailController
{
    public function indexAction()
    {

    }

    public function sendAction()
    {
        // 获取参数
        $id = 1;
        $title = "邮件的主题";
        $contents = "邮件的内容";

        if (!$id || !$title || !$contents) {
            return "失败";
        }

        $model = new MailModel();
        if ($model->send(intval($id),trim($title),trim($contents))){
            return "成功";
        }else{
            return "失败";
        }

    }
}
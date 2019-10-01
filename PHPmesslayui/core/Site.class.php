<?php

class Site extends Controller{
    //加载
    public function __construct(){
        parent::__construct();
        $this->assign('config',self::siteConfig());
    }

    //网站的配置信息
    static public function siteConfig(){
        $config=array(
            'sitename'=>'简单留言本',
            'siteurl' =>APP_URL,
            'imgurl'=>APP_URL.'/public/img',
            'cssurl'=>APP_URL.'/public/css',
            'jsurl'=>APP_URL.'/public/js',
        );
        return $config;
    }
}
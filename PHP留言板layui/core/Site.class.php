<?php
/**
 * Created by PhpStorm.
 * User: phpteach.com
 * Date: 2019/06/20
 * Time: 19:17
 */
class Site extends Controller{

    public function __construct(){
        parent::__construct();
        $this->assign('config',self::siteConfig());
    }

    /**
     * 网站配置
     * @return array
     */
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
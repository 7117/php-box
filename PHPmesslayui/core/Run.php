<?php
/**
 * Created by PhpStorm.
 * User: phpteach.com
 * Date: 2019/06/20
 * Time: 18:01
 */
final class Run{
    static public function start(){
        // self::createDefaultPage();//创建初始页面
        //启动init方法
        self::init();//初始化设置  设置参数
        //启动
        self::loadCoreFiles();  //加载类库
        self::appRun();         //
    }

    //初始化设定
    //这边其实好实在处理路由的参数
    static private function init(){
        //获取home
        $m=isset($_GET['m'])?trim($_GET['m']):'Home';
        //获取index 控制器
        $c=isset($_GET['c'])?trim($_GET['c']):'Index';
        //获取动作！！！！
        $a=isset($_GET['a'])?trim($_GET['a']):'index';
        define('MODULE',$m);
        define('CONTROLLER',$c);
        define('ACTION',$a);
        //目录设定
        define('CORE_PATH',dirname(__FILE__));
        define('APP_PATH',dirname(CORE_PATH));
        define('CONF_PATH',APP_PATH.'/conf/');
        define('TEMP_PATH',APP_PATH.'/temp/');
        define('LIB_PATH',APP_PATH.'/libs/');
        define('COMMON_PATH',APP_PATH.'/common/');
        define('CONTROLLER_PATH',APP_PATH.'/controller/'.$c);
        define('VIEW_PATH',APP_PATH.'/view/'.$c);
    }

    //加载系统所需文件
    //加载文件 加载控制器文件 加载模型文件  加载方法文件
    static private function loadCoreFiles(){
        $files=array(
            //加载控制器的文件  加载模型类库   加载方法类库
            CORE_PATH.'/Controller.class.php',
            CORE_PATH.'/Model.class.php',
            COMMON_PATH.'functions.php'
            );
        //便利循环加载
        foreach ($files as $f){
            is_file($f) && include($f);
        }
    }

    //运行文件
    static private function appRun(){
        //加载数据库的配置文件
        include COMMON_PATH.'config.php';
        //加载网站的配置信息
        include CORE_PATH.'/Site.class.php';
        //加载
        $appfile=CONTROLLER_PATH.'/'.CONTROLLER.'Controller.class.php';
        if(is_file($appfile)){
            require $appfile; //载入文件
            $controller=CONTROLLER.'Controller';
            $action=ACTION;
            $obj=new $controller;
            $cls_methods = get_class_methods($obj);
            if(!in_array($action,$cls_methods)){
                exit('该操作不存在');
            }else{
                $obj->$action();
            }
        }else{
            exit('控制器不存在');
        }
    }

}
//静态累不需要新建对象
Run::start();
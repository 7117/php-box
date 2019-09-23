<?php
/**
 * Created by PhpStorm.
 * User: phpteach.com
 * Date: 2019/06/20
 * Time: 18:01
 */
final class Run{
    static public function start(){
        self::init();//初始化设置
        //self::createDefaultPage();//创建初始页面
        self::loadCoreFiles();
        self::appRun();
    }

    //初始化设定
    static private function init(){
        $m=isset($_GET['m'])?trim($_GET['m']):'Home';
        $c=isset($_GET['c'])?trim($_GET['c']):'Index';
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

    //创建初始页面
    static private function createDefaultPage(){
        if(is_dir(TEMP_PATH)) return;
        if(!is_dir(TEMP_PATH)){
            mkdir(TEMP_PATH,0777,true);
        }
        $data=<<<str
<?php
    class IndexController extends Controller{
    
        public function index(){
            echo '<h1>项目创建成功，这是初始页面！</h1>';
        }
    }
?>
str;
        if(!is_file(CONTROLLER_PATH)){
            mkdir(CONTROLLER_PATH,0777,true);
        }
        file_put_contents(CONTROLLER_PATH.'/IndexController.class.php',$data);
    }

    //加载系统所需文件
    static private function loadCoreFiles(){
        $files=array(
            CORE_PATH.'/Controller.class.php',
            CORE_PATH.'/Model.class.php',
            COMMON_PATH.'functions.php'
            );
        foreach ($files as $f){
            is_file($f) && include($f);
        }
    }

    //运行文件
    static private function appRun(){
//        $included_files = get_included_files();
//        foreach ($included_files as $filename) {
//            echo "$filename\n";
//        }
        include COMMON_PATH.'config.php';//设置文件
        include CORE_PATH.'/Site.class.php';//网站配置文件
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
@Run::start();
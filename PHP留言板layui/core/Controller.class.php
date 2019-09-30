<?php
/**
 * Created by PhpStorm.
 * User: phpteach.com
 * Date: 2019/06/20
 * Time: 18:40
 */
include LIB_PATH.'smarty/Smarty.class.php';
class Controller {
   private $_smarty;

    public function __construct() {
        $this->_smarty=new Smarty();
        $template_dir=APP_PATH.'/view/'.CONTROLLER;
        $compile_dir=APP_PATH.'/temp/'.CONTROLLER;
        $this->_smarty->template_dir=$template_dir;
        $this->_smarty->compile_dir=$compile_dir;
        is_dir($template_dir) || mkdir($template_dir,0777,true);
        is_dir($compile_dir) || mkdir($compile_dir,0777,true);
    }

    public function display($tpl){
        $this->_smarty->display($tpl);
    }

    public function assign($name,$value){
        $this->_smarty->assign($name,$value);
    }


}
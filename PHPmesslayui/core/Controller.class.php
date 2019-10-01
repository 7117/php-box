<?php
//引用类的smarty的
include LIB_PATH.'smarty/Smarty.class.php';
class Controller {
    //保存临时变量的
    private $_smarty;

    public function __construct() {
        //初始化smartys
        $this->_smarty=new Smarty();
        //模板页面的
        $template_dir=APP_PATH.'/view/'.CONTROLLER;
        //模板编译的路径
        $compile_dir=APP_PATH.'/temp/'.CONTROLLER;
        is_dir($template_dir) || mkdir($template_dir,0777,true);
        is_dir($compile_dir) || mkdir($compile_dir,0777,true);
        //进行赋值
        $this->_smarty->template_dir=$template_dir;
        $this->_smarty->compile_dir=$compile_dir;

    }
    //进行分配模板的方法
    public function display($tpl){
        $this->_smarty->display($tpl);
    }
    //进行分配变量的方法
    public function assign($name,$value){
        $this->_smarty->assign($name,$value);
    }


}
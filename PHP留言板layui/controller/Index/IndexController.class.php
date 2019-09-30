<?php
/**
 * Created by PhpStorm.
 * User: phpteach.com
 * Date: 2019/06/20
 * Time: 20:22
 * 如不能正常运行请加Q群：52581432
 * =====================================================================
 * 项目简介：
 * 本程序是用助于初学PHP者更加快速的加入到实战中，从实战中更快的掌握PHP知识，更快的成长。
 * 签于前期未得反馈，只展示留言本增、改、删功能，
 * 未加入后台管理及管理员权限功能，如果有这方面的需求或是想更加快速的学习PHP知识，
 * 欢迎加入PHP实战群一起学习与探讨。QQ群：52581432
 * 有什么问题也可以在群里面反馈。
 * =====================================================================
 * 以下是建数据库代码
 * <!----数据库代码开始----->
CREATE TABLE `www_message` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`title` varchar(50) DEFAULT NULL COMMENT '标题',
`content` varchar(200) DEFAULT '' COMMENT '内容',
`reply_content` varchar(200) DEFAULT '' COMMENT '回复内容',
`create_time` char(12) DEFAULT NULL COMMENT '创建时间',
`reply_time` char(12) DEFAULT NULL COMMENT '回复时间',
`uip` char(16) DEFAULT NULL COMMENT '用户IP',
`status` tinyint(1) DEFAULT '0' COMMENT '是否审核',
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 * <!----数据库代码结束--->
 */
class IndexController extends Site {

    private $model;
    private $DB;

    public function __construct(){
        parent::__construct();
        $this->model=new Model();
        $this->DB='www_message';
    }

    /**
     * 首页列表
     */
    public function index(){
        $page_size=3;//页显示数，根据自己需要调整
        $pageCurrent=!empty($_GET["p"])?$_GET['p']:'1';
        $currentNum=($pageCurrent-1)*$page_size;
        $sql="select * from `".$this->DB."` ORDER BY id desc";
        $query=$sql." limit $currentNum,$page_size";
        $reccount=mysqli_num_rows($this->model->query($sql));

        $list=$this->model->query($query);
        $page=Pager('',$reccount,$page_size,$pageCurrent,10);

        $this->assign('list',$list);
        $this->assign('pager',$page);
        $this->display('index.php');
    }

    //删除留言操作
    public function delete(){
        $id=$_GET['id'];
        $where['id']=$id;
        $result=$this->model->delete($this->DB,$where);
        if($result==true){
            exit(json_encode(array('status'=>true,'info'=>'删除成功')));
        }else{
            exit(json_encode(array('status'=>false,'info'=>'删除失败')));
        }
    }

    /**
     * 添加留言操作
     */
    public function add(){
        $postData=$_POST['info'];
        $postData['create_time']=time();
        $postData['uip']=get_client_ip();
        $res=$this->model->inserttable($this->DB,$postData);
        if($res){
            exit(json_encode(array('status'=>true,'info'=>'留言成功')));
        }else{
            exit(json_encode(array('status'=>false,'info'=>'留言失败')));
        }
    }

    /**
     * 回复留言
     */
    public function edit(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $postData=$_POST['info'];
            $where['id']=$postData['id'];
            unset($postData['id']);
            $res=$this->model->updatetable($this->DB,$postData,$where);
            if($res){
                exit(json_encode(array('status'=>true,'info'=>'留言修改成功','isclose'=>true)));
            }else{
                exit(json_encode(array('status'=>false,'info'=>'留言修改失败')));
            }
        }else{
            $msgid=$_GET['id'];
            $msgData=$this->model->getone('select `id`,`title`,`content` from `'.$this->DB.'` where id='.$msgid);
            if(empty($msgData)){
                exit('您查看的留言不存在或被删除！');
            }else{
                $this->assign('msgdata',$msgData);
                $this->display('edit.php');
            }
        }
    }

    /**
     * 回复留言
     */
    public function reply(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $postData=$_POST['info'];
            $postData['reply_time']=time();
            $where['id']=$postData['id'];
            unset($postData['id']);
            $res=$this->model->updatetable($this->DB,$postData,$where);
            if($res){
                exit(json_encode(array('status'=>true,'info'=>'回复留言成功','isclose'=>true)));
            }else{
                exit(json_encode(array('status'=>false,'info'=>'回复留言失败')));
            }
        }else{
            $msgid=$_GET['id'];
            $msgData=$this->model->getone('select * from `'.$this->DB.'` where id='.$msgid);
            if(empty($msgData)){
                exit('您查看的留言不存在或被删除！');
            }else{
                $this->assign('msgdata',$msgData);
                $this->display('reply.php');
            }
        }
    }
}
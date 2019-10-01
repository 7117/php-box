<?php
class IndexController extends Site {

    private $model;
    private $DB;

    //构造函数
    public function __construct(){
        parent::__construct();
        //指定模型
        $this->model=new Model();
        //指定数据库
        $this->DB='www_message';
    }

    /**
     * 首页列表
     */
    public function index(){
        //页面长度
        $page_size=3;
        //获取页码
        $pageCurrent=!empty($_GET["p"])?$_GET['p']:'1';
        //长度id
        $currentNum=($pageCurrent-1)*$page_size;
        //sql
        // 分页limit offset,size;  offset是开始的索引 size是长度含量的 limit offset size;limit (page-1)*size,size;        $sql="select * from `".$this->DB."` ORDER BY id desc";
        $query=$sql." limit $currentNum,$page_size";
        //mysqli_num_rows返回的是总的行数  里面的query是查询的结果
        $reccount=mysqli_num_rows($this->model->query($sql));
        //这个返回的当前页面的数据
        $list=$this->model->query($query);

        $page=Pager('',$reccount,$page_size,$pageCurrent,10);

        //指定数据变量   list变量
        $this->assign('list',$list);
        //指定页码
        $this->assign('pager',$page);
        //指定页面  指定index.php页面
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
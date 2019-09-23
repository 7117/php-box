<?php
header("Content-type:text/html;charset=utf-8");
class upload{

    public $_file;

    public $new_dir="./aaa";

    // 数据校验
    public function __construct(){

    	$this->_file = $_FILES['uploadfile'];

        if(!isset($_FILES['uploadfile'])){
            exit('上传失败1');
        }

        if(!is_uploaded_file($_FILES['uploadfile']['tmp_name'])){
        	exit('上传失败3');
        }
    }

    public function moveTo($new_dir){
    	// 建立目录
    	if(!file_exists($new_dir)){
            mkdir($new_dir,true);
        }
        // 移动文件
        if(move_uploaded_file($this->_file['tmp_name'],$new_dir.$this->_file['name'])){
            echo "success";
        }else{            
        	exit('上传失败4');
        }
        
    }
}

$upload=new upload();
$upload->moveTo($upload->new_dir);
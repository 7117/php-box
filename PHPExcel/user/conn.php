<?php
namespace PHPExcel\user;

define("host","localhost");
define("user","root");
define("pwd","root");
define("db","test1");
define("port",3306);


class conn{
    public $conn=null;

    public function __construct(){
        $this->conn=mysqli_connect(host,user,pwd,db,port);
        mysqli_query($this->conn,"set names utf8");
    }
}



<?php
use PHPExcel\user\conn;
include "conn.php";

class db extends conn {
    public function getResult($sql){
        $result=[];
        $res=mysqli_query($this->conn,$sql);
        while($row=mysqli_fetch_assoc($res)){
            $result[]=$row;
        }
        return $result;
    }

    public function getData($grade){
        $sql="select * from excel where grade=$grade order by score desc";
        $res=$this->getResult($sql);
        return $res;
    }

}

$db=new db();

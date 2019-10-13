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

    public function getAllGrades(){
        $sql="select distinct grade from excel  order by grade asc";
        $res=$this->getResult($sql);
        return $res;
    }

    public function getClassByGrade($grade){
        $sql="select distinct class from excel where grade=$grade order by score desc";
        $res=$this->getResult($sql);
        return $res;
    }

    public function getStudentByClass($class,$grade){
        $sql="select * from excel where class={$class} and grade={$grade}";
        $res=$this->getResult($sql);
        return $res;
    }

}

$db=new db();

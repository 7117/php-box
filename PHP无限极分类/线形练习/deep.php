<?php
include "conn.php";

function getList($cid=0,&$result=[]){
    global $conn;
    $sql="select * from sort where id={$cid}";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);

    if($row){
        $result[]=$row['catename'];
        getList($row['pid'],$result);
    }
    krsort($result);
    return $result;
}

function display($id=10){
    $res=getList($id);
    $str="";
    foreach ($res as $k=>$v){
        if($k==0){
            $str.="<a href='conn.php'>"."{$v}".'</a>';
        }else{
            $str.="<a href='conn.php'>"."{$v}".'</a>'.'>';
        }
    }

    return $str;
}

$str=display(10);
echo $str;
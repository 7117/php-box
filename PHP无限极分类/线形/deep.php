<?php
include "conn.php";

function getCatePath($cid,&$result=[]){
    global $conn;
    if(is_null($cid)){
        return $result;
    }
    $sql="select * from sort where id={$cid}";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    if($row){
        $result[]=$row;
        getCatePath($row['pid'],$result);
    }
    krsort($result);
    return $result;
}

function display($cid){
    $str='';
    $result=getCatePath(10);
    foreach ($result as $k=>$v){
        $str.="<a href='cate.php?cid={$v['id']}'>{$v['catename']}</a>".'>>';
    }
    return $str;
}

$res=display(10);
echo $res;


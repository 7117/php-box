<?php

include "conn.php";

function getTree($pid,&$result=[],$spac=0){
    global $conn;
    $spac=$spac+2;
    $sql="select * from sort where pid={$pid}";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $row['catename']=str_repeat('&nbsp;&nbsp;',$spac).$row['catename'];
        $result[]=$row;
        getTree($id,$result,$spac);
    }
    return $result;
}

function display($sid=0){
    $res=getTree(0);
    echo "<select name='cate'>";
    foreach($res as $k=>$v){
        if($sid==$v['id']){
            echo "<option selected>{$v['catename']}</option>";
        }else{
            echo "<option >{$v['catename']}</option>";
        }
    }
    echo "</select>";
}

echo "<br>";
display(3);
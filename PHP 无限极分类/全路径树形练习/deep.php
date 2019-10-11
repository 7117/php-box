<?php
include "conn.php";

function getTreeTree(){
    global $conn;
    $result=[];
    $sql="select id,catename,concat(ifnull(path,''),',',id) as fullpath from full order by fullpath asc";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
        $deep=explode(",",$row['fullpath']);
        $row['catename']=str_repeat("&nbsp;&nbsp;",intval(count($deep))*2).$row['catename'];
        $result[]=$row;
    }
    return $result;
}


function display(){
    $res=getTreeTree();
    echo "<select name='aa'>";
    foreach($res as $k=>$v){
        echo "<option>{$v['catename']}</option>";
    }
    echo "</select>";
}

display();
<?php
include "conn.php";

function getList($pid=0,&$result=[],$spac=0){
    global $conn;
    $spac=$spac+2;
    $sql="select * from sort where pid=$pid";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    while($row=mysqli_fetch_assoc($res)){
        $row['catename']=str_repeat('&nbsp;',$spac).'|---'.$row['catename'];
        $result[]=$row;
        getList($row['id'],$result,$spac);
    }
    return $result;
}

function display($pid=0,$selected=0){
    $rea=getList($pid);
    $str='';
    $str.="<select name='cate'>";
    foreach($rea as $k=>$v){
        $selectedstr='';
        if($v['id']==$selected){
            $selectedstr="selected";
        }
        $str.="<option {$selectedstr}>{$v['catename']}</option>";
    }
    $str.="</select>";
    return $str;
}

echo display(0,5);





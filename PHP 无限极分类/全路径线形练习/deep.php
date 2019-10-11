<?php

include "conn.php";

function getLink($id){
    $str='';
    global $conn;
    $sql="select * from full where id={$id}";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $selfname=$row['catename'];
    $arr=explode(',',$row['path']);
    foreach($arr as $k=>$v){
        $sql="select catename from full where id={$v}";
        $sql=mysqli_query($conn,$sql);
        $catename=implode('',mysqli_fetch_assoc($sql));
        if($k==count($arr)-1){
            $str=$str."<a href='conn.php'>"."$catename"."</a>"."><a href='conn.php'>$selfname</a>";
        }else{
            $str.="<a href='conn.php'>"."$catename"."</a>".">";
        }
    }
    return $str;
}

$res=getLink(10);
echo "$res";
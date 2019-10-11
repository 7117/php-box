<?php

include "conn.php";

function getMulu($path="",$result=[]){
    global $conn;
    $sql="select id,catename,concat(path,',',id) as fullpath from full order by fullpath asc";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
        $deep=explode(',',$row['fullpath']);
        $row['catename']=str_repeat("&nbsp;&nbsp;",intval($deep[1])).$row['fullpath'];
        $result[]=$row;
    }
    return $result;
}

$res=getMulu();
echo "<pre>";
print_r($res);
echo "</pre>";
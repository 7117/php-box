<?php
include "conn.php";

function getMulu($path="",$result=[]){
    global $conn;
    $sql="select id,catename,concat(ifnull(path,''),',',id) as fullpath from full order by fullpath asc";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
        var_dump($row['fullpath']."$$$".$row['catename']);
        $deep=explode(',',trim($row['fullpath'],','));
        //这个的长度是按照fullpath的个数进行计算的
        $row['catename']=str_repeat("&nbsp;&nbsp;",intval(count($deep))).$row['catename'];
        $result[]=$row;
    }
    return $result;
}

function display(){
    $res=getMulu();
    echo "<br>";
    echo "<select name='aa'>";
    foreach($res as $k=>$v){
        echo "<option>{$v['catename']}</option>";
    }
    echo "</select>";
}

display();

//按照fullpath进行排序  就已经确定好了父子关系  按照id+pathid进行排序的
// string ',1$$$手机' (length=11)
// string '1,2$$$功能手机' (length=18)
// string '1,2,3$$$老人手机' (length=20)
// string '1,2,3,10$$$大字手机' (length=23)
// string '1,2,4$$$儿童手机' (length=20)
// string '1,2,4,9$$$色盲手机' (length=22)
// string '1,5$$$智能手机' (length=18)
// string '1,5,6$$$安卓手机' (length=20)
// string '1,5,7$$$ios手机' (length=17)
// string '1,5,8$$$win手机' (length=17)
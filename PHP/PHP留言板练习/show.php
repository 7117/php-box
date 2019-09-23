<?php
$conn=new mysqli("127.0.0.1","root","root","onecms");
$sql="select * from btest";

//query并不能真正的查询出出来  mysql_fetch_all才会
$res=$conn->query($sql);

$res=mysqli_fetch_all($res,MYSQLI_NUM);

$data=[];
foreach($res as $k=>$v){
    $data[$k]=$v;
}
?>

<!DOCTYPE html>
<HTML>
<head>
</head>
<body>
    <?php foreach($data as $k=>$v):?>
    <div style="border:2px solid black">
        <p style="background-color: #00a8ee"><?=$v[0]?></p>
        <p style="background-color: lightgoldenrodyellow"><?=$v[1]?></p>
        <p style="background-color: brown"><?=$v[2]?></p>
    </div>
    <?php endforeach;?>
</body>
</HTML>
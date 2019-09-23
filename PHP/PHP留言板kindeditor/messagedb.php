<?php
include 'mysqli.php';
//$page= isset($_GET["page"])?$_GET["page"]:1;
$page= $_GET["page"];
$num=$_GET["num"];
$startnum=($page-1)*$num; //开始位置
$con=isset($_GET["con"])?$_GET["con"]:"";//搜索关键字
$content=isset($_GET["content"])?$_GET["content"]:"";//搜索get请求参数
$sql="select * from message where 1=1";
if($content=="sousuo"){
    $sql.=" and title like '%$con%' or content like '%$con%'";
}
$sql.=" limit $startnum,$num";
$result=$mysqli->query($sql);
if($result->num_rows>0)
{
    while ($row=$result->fetch_assoc())
    {
        $arr[$row["id"]]["title"]=$row["title"];//$arr[1]["title"]=$row["title"]
        $arr[$row["id"]]["content"]=$row["content"];//$arr[1]["content"]=$arr["content"]
    }
}
//var_dump($arr);die;
echo json_encode($arr);
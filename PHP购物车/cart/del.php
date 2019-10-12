<?php
$productid=$_POST['productid'];

try{
    //1.链接pdo
    //2.使用query设置字符集
    //3.写出sql语句
    //4.预处理prepare
    //5.执行execute语句sql
    //6.取回fetch
    //7.行数rowCount
    $pdo = new PDO("mysql:host=localhost;dbname=test1", "root", "root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $pdo->query("set names utf8");
    $sql="delete from shop_cart where productid={$productid}";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$productid]);

    $res=[
        'code'=>1,
        'res'=>$productid
    ];
    $res=json_encode($res);
    echo $res;
    die();

}catch(PDOException $e){
    var_dump("错误");
    echo $e->getMessage();
}
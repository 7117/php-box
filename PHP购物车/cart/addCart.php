<?php
// 1.接受数据
// 2.处理数据
// 3.完成添加
// 4.返回结果

$productid=intval($_POST['productid']);
$num=intval($_POST['num']);

session_start();

$userid=1;

try{
    $pdo = new PDO("mysql:host=localhost;dbname=test1","root","root",
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $pdo->query("set names utf8");
    $sql="select price from shop_product where id=?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$productid]);
    $data=$stmt->fetch(PDO::FETCH_ASSOC);

    $price=$data['price'];
    $create=time();
    $sql="insert into shop_cart (id,productid,userid,num,price,createtime) 
          values(?,?,?,?,?,?)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([null,$productid,$userid,$num,$price,$create]);
    $rows=$stmt->rowCount();
}catch(PDOException $e){
    echo $e->getMessage();
}

if($rows){
    $response=[
            "code"=>1,
            "mes"=>"success",
            "price"=>$data
    ];
    echo json_encode($response);
}else{
    $response=[
        "code"=>0,
        "mes"=>"fail"
    ];
    echo json_encode($response);
}




<?php
// 1.接受数据
// 2.处理数据
// 3.完成添加
// 4.返回结果

$productid = intval($_POST['productid']);
$num = intval($_POST['num']);

session_start();

$userid = 1;

try {
    $pdo = new PDO("mysql:host=localhost;dbname=test1", "root", "root",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $pdo->query("set names utf8");
    $sql = "select price from shop_product where id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$productid]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $price = $data['price'];
    $create = time();

    $sql = "select * from shop_cart where productid=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$productid]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $originnum = $data['num'];

    $rows = $stmt->rowCount();
    //如果之前有的话
    if ($rows) {
        $sql = "update shop_cart set num=? where productid=?";
        $stmt = $pdo->prepare($sql);
        $nownum = $originnum + $num;
        $stmt->execute([$nownum, $productid]);
        $rows = $stmt->rowCount();
        res($rows, []);
    } else {
        //如果之前没有的话
        $sql = "insert into shop_cart (id,productid,userid,num,price,createtime) 
          values(?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([null, $productid, $userid, $num, $price, $create]);
        $rows = $stmt->rowCount();
        res($rows, $data);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

function res($rows, $data)
{
    if ($rows) {
        $response = [
            "code" => 1,
            "mes" => "success",
            "price" => $data
        ];
        echo json_encode($response);
        die();
    } else {
        $response = [
            "code" => 0,
            "mes" => "fail"
        ];
        echo json_encode($response);
        die();
    }
}




<?php
    session_start();

    $productid = intval($_POST['productid']);
    $num = intval($_POST['num']);
    $userid = $_SESSION['memberid'];

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=test1","root","root",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $pdo->query("set names utf8");
        $sql = "update shop_cart set num=? where userid=? and productid=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($num, $userid, $productid));
        $rows = $stmt->rowCount();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    //4.���ؽ��
    if($rows){
        $response = array(
            'errno'         => 0,
            'errmsg'      => 'success',
            'data'          => true,
        );
    }else{
        $response = array(
            'errno'         => -1,
            'errmsg'      => 'fail',
            'data'          => false,
        );
    }
    
    echo json_encode($response);
    
    
    
    
    
    
    
    
    
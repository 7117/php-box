<!DOCTYPE html>
<html>
<title>商品详情页，添加商品</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="shortcut icon" href="http://localhost/upload/favicon.ico">
<link rel="icon" href="http://localhost/upload/animated_favicon.gif" type="image/gif">
<link href="./resource/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./js/addCart.js"></script>


<div>
    <ul class="bnt_ul">
        <li class="clearfix">
            <dd>
                <strong>购买数量：</strong>
                <input name="number" type="text" id="number" value="1" size="4" onblur="" style="border:1px solid #ccc; ">
                <strong>商品总价：</strong>
            </dd>
        </li>

        <li class="padd">
            <a href="javascript:addCart(12);">
                <img src="./resource/goumai2.gif">
            </a>
        </li>
    </ul>
</div>
</html>


<!--获取商品的详细信息-->
<?php
try {
    session_start();
    $pdo = new PDO("mysql:host=localhost;dbname=test1", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $pdo->query("set names utf8");
    $sql = "select * from shop_product where id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET['productid']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

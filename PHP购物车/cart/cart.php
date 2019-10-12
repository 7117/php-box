<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="“http://open.weibo.com/wb”"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Generator" content="商城">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>购物车页面</title>
    <link rel="shortcut icon" href="http://localhost/upload/favicon.ico">
    <link rel="icon" href="http://localhost/upload/animated_favicon.gif" type="image/gif">
    <link href="./resource/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="./resource/common.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./resource/shopping_flow.js"></script>
    <script type="text/javascript" src="./js/delPro.js"></script>
</head>
<body>

<div class="block table">
    <div class="flowBox">
        <form id="formCart" name="formCart" method="post" action="http://localhost/upload/flow.php">
            <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tbody>
                <tr>
                    <th bgcolor="#ffffff">图片</th>
                    <th bgcolor="#ffffff">单价</th>
                    <th bgcolor="#ffffff">购买数量</th>
                    <th bgcolor="#ffffff">修改数量</th>
                    <th bgcolor="#ffffff">总计价格</th>
                </tr>


<!--这里是在进行查询购物车的相关信息-->
<?php
try{
    session_start();
    $pdo = new PDO("mysql:host=localhost;dbname=test1", "root", "root",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $pdo->query("set names utf8");
    $sql="select * from shop_product p left join shop_cart c on p.id=c.productid where userid=?";
    $stmt=$pdo->prepare($sql);
    //模拟用户的id
    $_SESSION['a']=1;
    $userid=$_SESSION['a'];
    $stmt->execute([$userid]);
    $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($res);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>

<?php foreach ($res as $k=>$v):?>
    <tr class="products" id="<?php echo 'tr'.$v['productid']?>">
        <td align="center" bgcolor="#ffffff"><img src="<?php echo $v['title'];?>"></td>
        <td align="center" bgcolor="#ffffff"><span id="<?php echo $v['productid']?>"><?php echo $v['price'];?></span></td>
        <td align="center" bgcolor="#ffffff"><span id="11"><?php echo $v['num'];?></span></td>
        <td align="center" bgcolor="#ffffff">
            <input type="text" name="goods_number" value="<?php echo $v['num']?>" onblur="changeNum(<?php echo $v['productid'];?>,this.value)">
            <script type="text/javascript" src="./js/changeNum.js"></script>
        </td>
        <td align="center" bgcolor="#ffffff"><span id="total"><?php echo $v['num']*$v['price'];?></span></td>
        <td align="center" bgcolor="#ffffff">
            <a href="javascript:delPro(<?php echo $v['productid'];?>);" class="f6">删除</a>
        </td>
    </tr>
<?php endforeach;?>

</tbody>
</table>
</form>
</div>
</div>
</body>
</html>




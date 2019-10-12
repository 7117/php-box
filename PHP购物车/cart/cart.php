<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="“http://open.weibo.com/wb”"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Generator" content="商城">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>商城</title>
    <link rel="shortcut icon" href="http://localhost/upload/favicon.ico">
    <link rel="icon" href="http://localhost/upload/animated_favicon.gif" type="image/gif">
    <link href="./resource/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="./resource/common.js"></script>
    <script type="text/javascript" src="./resource/shopping_flow.js"></script>
</head>
<body>



<div class="block table">
    <script type="text/javascript" src="./resource/showdiv.js"></script>  <script type="text/javascript">
        var user_name_empty = "请输入您的用户名！";
        var email_address_empty = "请输入您的电子邮件地址！";
        var email_address_error = "您输入的电子邮件地址格式不正确！";
        var new_password_empty = "请输入您的新密码！";
        var confirm_password_empty = "请输入您的确认密码！";
        var both_password_error = "您两次输入的密码不一致！";
        var show_div_text = "请点击更新购物车按钮";
        var show_div_exit = "关闭";
    </script>
    <div class="flowBox">
        <h6><span>商品列表</span></h6>
        <form id="formCart" name="formCart" method="post" action="http://localhost/upload/flow.php">
            <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tbody>
                <tr>
                    <th bgcolor="#ffffff">商品名称</th>
                    <th bgcolor="#ffffff">市场价</th>
                    <th bgcolor="#ffffff">本店价</th>
                    <th bgcolor="#ffffff">购买总价</th>
                    <th bgcolor="#ffffff">小计</th>
                    <th bgcolor="#ffffff">操作</th>
                </tr>


<!--这里是在进行查询购物车的相关信息-->
<?php
try{
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



<!--这里是在进行遍历购物车的商品-->
<?php foreach ($res as $k=>$v):?>
<tr class="products">
    <td bgcolor="#ffffff" align="center" style="width:300px;">
        <a href="" target="_blank"><?php $v['title'];?></a><br>
        <a href="" target="_blank" class="f6"><?php $v['title'];?></a>
    </td>

    <td align="center" bgcolor="#ffffff">
        <img src="<?php echo $v['title'];?>">
    </td>
    <td align="center" bgcolor="#ffffff"><span id="11"><?php echo $v['price'];?></span></td>
    <td align="center" bgcolor="#ffffff"><span id="222"><?php echo $v['num'];?></span></td>
    <td align="center" bgcolor="#ffffff"><span id="11"><?php echo '总价'.$v['price']*$v['num'];?></span></td>
    <td align="center" bgcolor="#ffffff">
        <input type="text" name="goods_number" value="11" size="4" class="inputBg" style="text-align:center "
               onblur="changeNum(<?php echo $v['productid'];?>,1?>)" id="11"" >
        <script type="text/javascript" src="./js/changeNum.js"></script>
    </td>
    <td align="center" bgcolor="#ffffff">￥<span id="111"><?php $v['price'];?></span>元</td>
    <td align="center" bgcolor="#ffffff">
        <a href="javascript:delPro(111);" class="f6">删除</a>
    </td>
</tr>
<?php endforeach;?>


<!--此处js的代码-->
<script type="text/javascript">
    function delPro(productid){
        //通过ajax将商品的id传递给PHP脚本进行数据表的删除
        var url = "deleteProduct.php";
        var data = {"productid":productid};
        var success = function(response){
            if(response.errno == 0){
                $("#tr-"+productid).remove();
            }
        }
        $.get(url, data, success, "json");
    }
</script>

</tbody>
</table>
</form>
</div>
</div>
</body>
</html>




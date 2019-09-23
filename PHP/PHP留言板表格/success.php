<?php
header("CONTENT-TYPE:text/html;charset=UTF-8");
define("HOST","127.0.0.1");
define("USERNAME","root");
define("PASSWORD","root");
define("DB","onecms");
if($con=new mysqli(HOST,USERNAME,PASSWORD,DB)){
    echo $con->error;
}
if($con->select_db("onecms")){
    echo $con->error;
}
if($con->query("SET NAMES utf8")){
    echo $con->error;
}
$sql="select * from board ORDER BY dateline DESC ";

$str=$con->query($sql);
if($str && mysqli_num_rows($str)){
    while($row= mysqli_fetch_assoc($str)){
        $data[]=$row;
    }
}

?>
<!DOCTYPE HTML>
<HTML>
<Head>
    <meta  http-equiv="CONTENT-TYPE" ; content="text/html"  ; charset="UTF-8">
    <title>留言板</title>
    <style type="text/css">

    </style>
</Head>
<Body>
<div>
    <?php
    if(empty($data)){
        echo "当前没有留言";
    }
    else{
    foreach($data as $value) {
    ?>
    <table cellpadding="2" cellspacing="8" align="center" border="1px,solid">

        <tr>
            <td>标题</td>
            <td><?php echo $value['title']; ?></td>
        </tr>
        <tr>
            <td>作者</td>
            <td><?php echo $value['author']; ?></td>
        </tr>
        <tr>
            <td>内容</td>
            <td><?php echo $value['message']; ?></td>
        </tr>
        <tr>
            <td><?php echo $value['dateline'];;?></td>
        </tr>
    </table>
</div>
<?php
 }
}
?>
</Body>
</HTML>
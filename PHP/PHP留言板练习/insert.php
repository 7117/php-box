<?php
$id=$_POST['id'];
$title=$_POST['title'];
$time=microtime(true);

$con=new mysqli("127.0.0.1","root","root","onecms");
$sql="insert into btest (id,title,time) values(null,'$title','$time')";
$res=$con->query($sql);
if($res){
    echo "<script>alert('t');window.location.href='t.php';</script>";
}else{
    echo '<script>alert("f");window.location.href="f.php";</script>';
}

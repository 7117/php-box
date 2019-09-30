<?php

//连接数据库
$link = mysqli_connect('localhost', 'root', 'root','test');

mysqli_query($link,"set names gbk");//设置数据库编码

$result=mysqli_query($link,"select * from zhang where Name='a'");


// mysqli_fetch_arrayz只会打印一条符合条件的  var_dump($row);
// mysqli_fetch_all 取出所有的 var_dump($row[0]['name']);  会进行遍历foreach即可
// 
// MYSQLI_NUM    以数字作为索引
// MYSQLI_ASSOC  以属性作为索引
if($row=mysqli_fetch_all($result,MYSQLI_NUM)){

	foreach ($row as $key => $value) {
		var_dump($value);
		echo "<br>";
	}


}else{
	 echo "false";
}

mysqli_close($link); 


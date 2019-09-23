<?php

$link = mysqli_connect('localhost', 'root', 'root','test');

mysqli_query($link,"set names gbk");//设置数据库编码

$result=mysqli_query($link,"select * from city where city_id = 0");

if($row=mysqli_fetch_all($result)){


	$city = array_column($row, 'province' , 'id');

	foreach ($city as $key => $value) {
		var_dump($value);
		echo "<br>";
		echo "<br>";
	}

}else{
	 echo "false";
}

mysqli_close($link); 


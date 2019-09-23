<?php

try{ 
	$number = 0;
	if($number>1) { 
		// 新建一个exception类  对象里面包含的信息是 Value must be 1 or below
		throw new Exception("Value must be 1 or below"); 
	} 	

	echo 'true'; //如果为0  输出true

}catch(Exception $e){

	echo 'false'."<br>"; 
	// $e为对象  类是Exception   就好比是  int a;一个类型  一个实体化
	//如果为大于1的  输出错误信息
	echo 'Message:'.$e->getMessage(); 
} 

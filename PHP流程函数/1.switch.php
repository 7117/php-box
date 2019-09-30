<?php

$a="aaa";
switch ($a){
	case "aaa":
		echo "我是aaa";
		echo "<br>";
	case "sss":
		echo "我是ccc";
		echo "<br>";
	default:
		echo "我是ddd";
		echo "<br>";
}
// 只要第一个对 其他的都执行！
// 我是aaa
// 我是ccc
// 我是ddd

$a="aaa";
switch ($a){
	case "fff":
		echo "我是aaa";
		echo "<br>";
	case "aaa":
		echo "我是ccc";
		echo "<br>";
	default:
		echo "我是ddd";
		echo "<br>";
}
// 
// 我是ccc
// 我是ddd
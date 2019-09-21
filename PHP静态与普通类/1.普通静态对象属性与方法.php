<?php
// 记住哦
// 静态的属性加$  普通的不加$
// 静态不用新建   普通要新建哦~
class test{
	public $aa="我是普通的属性";

	public function bb(){
		echo "我是普通的方法";
	}
}

$test=new test();
var_dump($test);
echo "<br>";
var_dump($test->aa);
echo "<br>";
$test->bb();
echo "<br>";
echo "<br>";

class staticclass{
	public static $cc="我是静态的属性";

	public static function dd(){
		echo "我是静态的方法";
	}

	public static function ee(){
		var_dump(self::$cc);
	}
}
echo "<br>";
var_dump(staticclass::$cc);
echo "<br>";
staticclass::dd();
echo "<br>";
staticclass::ee();



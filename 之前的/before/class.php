<?php
class TestClass {
	public $attributeone="one";
	public function TestFunctionOne(){
		echo "<br> testone";
	}

	public static $attributetwo="two";
	public static function TestFunctionTwo(){
		echo "<br> testtwo";
	}
}

$publicone=new TestClass();
// 非静态的属性
$attributeone=$publicone->attributeone;
print_r($attributeone);
// 非静态的方法
$publicone->TestFunctionOne();


// 静态不需要新建对象  直接可以使用类
// 静态的属性
$attributetwo=TestClass::$attributetwo;
print_r('<br>'.$attributetwo);
// 静态的方法
$attributetwo=TestClass::TestFunctionTwo();


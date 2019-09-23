<?php

spl_autoload_register(function ($name) {
    // var_dump($name);
    include "./$name.php";
});

class Foo implements ITest {
	public function aaa(){
		echo "aaa";
	}
}

$c=new Foo();
$c->aaa();


<?php

class dd{
	public $ddd="aaa";
	public function dddd(){
		$a=$this->ddd;
		var_dump($a);
		var_dump(__class__);
	}
}

$f=new dd();
$f->dddd();
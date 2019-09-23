<?php

class MyException extends Exception
{
    public function __construct($message, $code = 0) {
        parent::__construct($message, $code);
    }
 
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
 
    public function customFunction() {
        echo "A Custom function for this type of exception\n";
    }
}

class TestException
{
    public $var;
 
    const THROW_NONE    = 0;
    const THROW_CUSTOM  = 1;
    const THROW_DEFAULT = 2;
 
    function __construct($avalue = self::THROW_NONE) {
 
        switch ($avalue) {
            case self::THROW_CUSTOM:
                throw new MyException('1 is an invalid parameter', 5);
                break;
 
            case self::THROW_DEFAULT:
                throw new Exception('2 isnt allowed as a parameter', 6);
                break;
 
            default:
                $this->var = $avalue;
                break;
        }
    }
}
 


try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (MyException $e) {      // 捕获异常
    echo "Caught my exception"."<br>";
    echo $e."<br>";
    echo $e->customFunction()."<br>";
} catch (Exception $e) {        // 被忽略
    echo "Caught Default Exception\n", $e;
}
 
 

 
try {
    $o = new TestException(TestException::THROW_DEFAULT);
} catch (MyException $e) {    
    echo "Caught my exception"."<br>";
    echo $e."<br>";
    echo $e->customFunction();
} catch (Exception $e) {  
	echo "<br>";
    echo "Caught Default Exception"."<br>";
}

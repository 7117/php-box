<?php
class SelfException extends Exception
{
    public function __construct($message, $code = 0) {
        $this->message=$message;
    }
    public function __toString() {
        return __CLASS__.$this->message;
    }
}

class TestException
{
    const THROW_CUSTOM  = 1;

    public function __construct($avalue = self::THROW_NONE) {

        switch ($avalue) {
            case self::THROW_CUSTOM:
                throw new SelfException('这个是自定义的信息', 5);
        }
    }
}

try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (SelfException $e) {
    echo "自定义的"."<br>";
    //只有在echo对象的时候会触发toString函数
    echo $e;
} catch (Exception $e) {
    echo "默认的", $e;
}


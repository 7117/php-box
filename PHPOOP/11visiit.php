<?php

class a{
    public function aaaa(){
        echo "a";
    }
}


class b extends a{
    const aa='aa';
    public $bb='bb';
    public static $cc='bb';
    public function bbbb(){
       self::aaaa();
       echo "<br>";
       $this->aaaa();
       echo "<br>";
       parent::aaaa();
       echo "<br>";
       echo self::aa;
       echo "<br>";
       echo $this->bb;
       echo "<br>";
       parent::aaaa();
       echo "<br>";
       echo self::$cc;
       echo "<br>";
    }
}

$c=new b();
$c->bbbb();

// a
// a
// a
// aa
// bb
// a
// bb
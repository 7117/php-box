<?php

class a
{
    //final禁止被重写
    final public function aaaa()
    {
        echo "a";
    }
}


class b extends a
{
    //( ! ) Fatal error: Cannot override final method a::aaaa() in D:\ph10.final.php on line 18
    public function aaaa()
    {
        echo "b";
    }
}

$c = new b();
// b  被重写
$c->aaaa();


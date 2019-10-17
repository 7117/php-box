<?php

class a
{
    final public function aaaa()
    {
        echo "a";
    }
}


class b extends a
{
    public function aaaa()
    {
        echo "b";
    }
}

$c = new b();
// b  被重写
$c->aaaa();


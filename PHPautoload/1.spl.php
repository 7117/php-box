<?php

print_r("1");


function Customa()
{
    require_once('./0.a.php');
}

function Customb()
{
    require_once('./0.b.php');
}

spl_autoload_register('Customa');
spl_autoload_register('Customb');

print_r("2");

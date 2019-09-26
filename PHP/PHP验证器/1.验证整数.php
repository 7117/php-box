<?php
$a=1111;

if(filter_var($a,FILTER_VALIDATE_INT)){
    echo "int";
    echo "<br>";
}

$b="111.11";
if(filter_var($b,FILTER_VALIDATE_INT)){
    echo "是";
}else{
    echo "f";
}
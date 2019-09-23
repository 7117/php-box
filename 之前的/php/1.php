<?php

$array=array('www','name'=>'phpernote','com');
echo "{$array['name']}";    //表示正确
echo $array['name'];        //表示正确
echo "$array[name]";        //表示正确
echo "$array['name']";      //表示错误
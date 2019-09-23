<?php

//数组转对象
function arrayToObject($e){

    if( gettype($e)!='array' ) return;
    foreach($e as $k=>$v){
        if( gettype($v)=='array' || getType($v)=='object' )
            $e[$k]=(object)arrayToObject($v);
    }
    return (object)$e;
}

//对象转数组
function objectToArray($e){
    $e=(array)$e;
    foreach($e as $k=>$v){
        if( gettype($v)=='resource' ) return;
        if( gettype($v)=='object' || gettype($v)=='array' )
            $e[$k]=(array)objectToArray($v);
    }
    return $e;
}
//对象转数组
function object_array($array){
    if(is_object($array)){
        $array = (array)$array;
    }
    if(is_array($array)){
        foreach($array as $key=>$value){
            $array[$key] = object_array($value);
        }
    }
    return $array;
}

//json到数组
function simple_json_parser($json){
    $json = str_replace("{","",str_replace("}","", $json));
    $jsonValue = explode(",", $json);
    $arr = array();
    foreach($jsonValue as $v){
        $jValue = explode(":", $v);
        $arr[str_replace('"',"", $jValue[0])] = (str_replace('"', "", $jValue[1]));
    }
    return $arr;
}


echo "<br>-------------------------------<br>";
echo "现在的数组<br><br>";
$arr=array(
    "name"=>"李小龙",
    "tel"=>"11111111111",
    "age"=>"12",
);
var_dump($arr);

echo "<br>-------------------------------<br>";
echo "<br><br>数组转对象<br><br>";
$obj= arrayToObject($arr);
var_dump($obj);
echo "<br><br>输出对象属性<br><br>";
var_dump($obj->name);

echo "<br>-------------------------------<br>";
echo "<br><br>对象转数组<br><br>";
$arr=object_array($obj);
var_dump($arr);
echo "<br><br>输出数组数值<br><br>";
var_dump($arr["name"]);

echo "<br>-------------------------------<br>";
echo "<br><br>Json到数组<br><br>";
$json ='{"a":"哈哈","b":"我","c":"数","d":"一","e":3,"f":2,"g":1,"h":"别生气了"}';
$arr=simple_json_parser($json);
var_dump($arr);
echo "<br>官方换种方法<br>";
echo "对象<br>";
var_dump(json_decode($json));
$a=json_decode($json);
echo "<br>属性:";
echo $a->a;
echo "<br>数组<br>";
var_dump(json_decode($json,true));

echo "<br>-------------------------------<br>";
echo "<br><br>数组到Json<br><br>";
var_dump($arr);
echo "<br>";
var_dump(json_encode($json, JSON_HEX_APOS));





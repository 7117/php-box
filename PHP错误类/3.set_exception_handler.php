<?php
try{
   if(3>2){
       throw new Exception("aaa");
   }
}catch(Exception $e){
   echo $e->getMessage();
}
echo "<br>";

// function aaa(Exception $e){
//     echo $e->getMessage();
// }
//
// set_exception_handler("aaa");
// throw new Exception("bbbb");

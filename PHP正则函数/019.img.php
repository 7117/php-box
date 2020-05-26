<?php

$reg = '/<img[^>]*src="([^"].+?)"/';


$str = '<img alt="默认分类" style="" id="" src="./application/sdasdasdasdaqw4yw8734/uploads/category/20161027/5811d3821ed087.67894714.png">
<img alt="默认分类" style="" id="" src="./application/sdasdasdasdaqw4yw8734/uploads/category/20161027/5811d3821ed087.67894715.png">';

preg_match_all($reg, $str, $con);
var_dump($con);


<?php

//使用量词约束筛选的字符数量
     $str = '<img alt="默认分类" style="" id="" src="./application/sdasdasdasdaqw4yw8734/uploads/category/20161027/5811d3821ed087.67894714.png"><img alt="默认分类" style="" id="" src="./application/sdasdasdasdaqw4yw8734/uploads/category/20161027/5811d3821ed087.67894715.png">';
    
    //需求：将上面字符中的图片地址筛选出来（//u斜线外面的u表示采用万能点模式）
    $reg = '/<img[^>]*src="(.+)">/us';
    //使用规则去字符串中筛选
    preg_match_all($reg, $str,$match);
    
    echo '<pre>';
    var_dump($match);
<?php
/**
 * 公共函数配置文件
 * Created by PhpStorm.
 * User: phpteach.com
 * Date: 2019/06/20
 * Time: 19:43
 */

/**
 * 输出格式
 * @param $var
 * @param bool $echo
 * @param null $label
 * @param bool $strict
 * @return mixed|null|string
 */
function dump($var, $echo=true, $label=null, $strict=true) {
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo($output);
        return null;
    }else
        return $output;
}

/**
 * 分页
 * @param $url
 * @param int $total
 * @param int $psize
 * @param int $pageid
 * @param int $halfPage
 * @return string
 */
function Pager($url,$total=0,$psize=10,$pageid=0,$halfPage=5)
{
    #[添加链接随机数]
    if(strpos($url,"?") === false)
    {
        $url = $url."?";
    }else{
        $url = $url."&";
    }
    #[共有页数]
    $totalPage = intval($total/$psize);
    if($total%$psize)
    {
        $totalPage++;#[判断是否存余，如存，则加一
    }
    #[如果分页总数为1或0时，不显示]
    if($totalPage<2)
    {
        return false;
    }
    #[判断分页ID是否存在]
    if(empty($pageid))
    {
        $pageid = 1;
    }
    #[判断如果分页ID超过总页数时]
    if($pageid > $totalPage)
    {
        $pageid = $totalPage;
    }
    #[Html]
    $array_m = 0;
    if($pageid > 1 && $totalPage > 1)
    {
        $returnlist[$array_m]["url"] = substr($url,0,strlen($url)-1);
        $returnlist[$array_m]["name"] = "首页";
        $returnlist[$array_m]["status"] = 2;

        $array_m++;
        $returnlist[$array_m]["url"] = $url."p=".($pageid-1);
        $returnlist[$array_m]["name"] = "« 上页";
        $returnlist[$array_m]["status"] = 4;
    }
    #[添加中间项]
    for($i=$pageid-$halfPage,$i>0 || $i=0,$j=$pageid+$halfPage,$j<$totalPage || $j=$totalPage;$i<$j;$i++)
    {
        $l = $i + 1;
        $array_m++;
        $returnlist[$array_m]["url"] = $url."p=".$l;
        $returnlist[$array_m]["name"] = $l;
        $returnlist[$array_m]["status"] = ($l == $pageid) ? 1 : 0;
    }
    #[添加select里的中间项]
    for($i=$pageid-$halfPage*100,$i>0 || $i=0,$j=$pageid+$halfPage*100,$j<$totalPage || $j=$totalPage;$i<$j;$i++)
    {
        $l = $i + 1;
        $select_option_msg = "<option value='".$l."'";
        if($l == $pageid)
        {
            $select_option_msg .= " selected";
        }
        $select_option_msg .= ">&nbsp;".$l."&nbsp;</option>";
        $select_option[] = $select_option_msg;
    }
    #[添加尾项]
    if($pageid < $totalPage)
    {
        $array_m++;
        $returnlist[$array_m]["url"] = $url."p=".($pageid+1);
        $returnlist[$array_m]["name"] = "下页 »";
        $returnlist[$array_m]["status"] = 4;
    }
    $array_m++;
    if($pageid != $totalPage)
    {
        $returnlist[$array_m]["url"] = $url."p=".$totalPage;
        $returnlist[$array_m]["name"] = "尾页";
        $returnlist[$array_m]["status"] = 2;
    }
    #[组织样式]
    $msg = "<div class=\"pager\"><ul><li class=\"to\">共 ".$totalPage." 页</li>";
    if($returnlist)
    {
        foreach($returnlist AS $key=>$value)
        {
            if($value['status']==1){
                $msg .= "<li><a class='current' href='".$value["url"]."'>".$value["name"]."</a></li>";
            }else{
                $msg .= "<li><a href='".$value["url"]."'>".$value["name"]."</a></li>";
            }
        }
        $msg .= "<li class=\"se\"><select onchange=\"top.location='".$url."p='+this.value;\">".implode("",$select_option)."</option></select></li>";
    }
    $msg .= "</ul></div>";
    unset($returnlist);
    return $msg;
}


/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
 * @return mixed
 */
function get_client_ip($type = 0,$adv=false) {
    $type       =  $type ? 1 : 0;
    static $ip  =   NULL;
    if ($ip !== NULL) return $ip[$type];
    if($adv){
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}


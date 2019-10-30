<?php
//获取某年某周的开始时间--结束时间
class week{
    public function weekday($year,$week=1){
        $year_start = mktime(0,0,0,1,1,$year);
        $year_end = mktime(0,0,0,12,31,$year);
        // 判断第一天是否为第一周的开始
        if (intval(date('W',$year_start))===1){
            $start = $year_start;//把第一天做为第一周的开始
        }else{
            $week++;
            $start = strtotime('+1 monday',$year_start);//把第一个周一作为开始
        }
        // 第几周的开始时间
        if ($week===1){
            $weekday['start'] = $start;
        }else{
            $weekday['start'] = strtotime('+'.($week-0).' monday',$start);
        }
        // 第几周的结束时间
        $weekday['end'] = strtotime('+1 sunday',$weekday['start']);
        if (date('Y',$weekday['end'])!=$year){
            $weekday['end'] = $year_end;
        }
        return $weekday;
    }
}

$week=new week();
$day=$week->weekday(2019,2);
var_dump($day);


/**
 * 获取某年第几周的开始日期和结束日期
 * @param int $year
 * @param int $week 第几周;
 */

// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP时间函数\18.weeked.php:31:
// array (size=2)
//   'start' => int 1547424000
//   'end' => int 1547942400
<?php

//获取某年某周的开始时间--结束时间
class weeka
{
    public function week($year)
    {
        $year_start = mktime(0, 0, 0, 1, 1, $year);
        $year_end = mktime(0, 0, 0, 12, 31, $year);
        if (intval(date('W', $year_end)) === 1) {
            return date('W', strtotime('last week', $year_end));
        } else {
            return date('W', $year_end);
        }
    }
}

$week=new weeka();
$day=$week->week(2019);
var_dump($day);


/**
 * 计算一年有多少周，每周从星期一开始，
 * 如果最后一天在周四后（包括周四）算完整的一周，否则不计入当年的最后一周
 * 如果第一天在周四前（包括周四）算完整的一周，否则不计入当年的第一周
 * @param int $year
 * return int
 */


// D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHP时间函数\19.weeknum.php:19:string '52' (length=2)
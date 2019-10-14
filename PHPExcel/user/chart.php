<?php
include "./dbfunc.php";
include "../Classes/PHPExcel.php";

$dir = dirname(__FILE__);
$excel = new PHPExcel();
$sheet = $excel->getActiveSheet();
$sheet->mergeCells("B10:H10");

/**
 * 生成统计表
 */
$array = [
    ['', '一班', '二班', '三班'],
    ['不及格', 20, 30, 40],
    ['良好', 40, 30, 20],
    ['优秀', 10, 20, 50],
];
$sheet->fromArray($array);

//线的个数
$labels = [
    //第一个参数：数值类型
    //第二个参数：位置
    //第三个参数：样式
    //第四个参数：个数
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$1', null, 1),
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$C$1', null, 1),
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$D$1', null, 1),
];
//轴X
$xlabels = [
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$2:$A$4', null, 3),
];

//数据
$data = [
    new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$2:$B$4', null, 3),
    new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$C$2:$C$4', null, 3),
    new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$4', null, 3),
];

//series  做出一个框架
$series = [
    new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_LINECHART,
        PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
        range(0, count($labels) - 1),
        $labels,
        $xlabels,
        $data
    )
];
$layout = new PHPExcel_Chart_Layout();
$layout->setShowVal(1);
$plot = new PHPExcel_Chart_PlotArea($layout, $series);
$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_LEFT, $layout,false);
$title = new PHPExcel_Chart_Title("高一学生成绩分布");
$xlabelName = new PHPExcel_Chart_Title("grade(等级)");
$ylableName = new PHPExcel_Chart_Title("count(人数)");

$chart = new PHPExcel_Chart(
    '名字',
    $title,
    $legend,
    $plot,
    true,
    false,
    $xlabelName,
    $ylableName

);
$chart->setTopLeftPosition("A7")->setBottomRightPosition("K25");
$sheet->addChart($chart);

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->setIncludeCharts(true);
exportBroswer('Excel2007', 'chartExcel.xlsx');//输出到浏览器
$write->save("php://output");

//进行输出到浏览器
function exportBroswer($type, $name)
{
    if ($type == "Excel5") {
        header('Content-Type: application/vnd.ms-excel');
    } else {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
    header('Content-Disposition: attachment;filename="' . $name . '"');
    header('Cache-Control: max-age=0');
}


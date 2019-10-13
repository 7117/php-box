<?php
include "../Classes/PHPExcel.php";

$dir=dirname(__FILE__);

$excel=new PHPExcel();
$activeSheet=$excel->getActiveSheet();
$activeSheet->setTitle("demo");
$activeSheet->setCellValue("A1","A1")->setCellValue("B1","B1");
$activeSheet->setCellValue("A2","A1")->setCellValue("B2","B1");
$arr=[
    [],
    [],
    ['姓名','成绩'],
    ['上午','下午'],
    ['上午','下午','','中午']
];
$activeSheet->fromArray($arr);
$file=PHPExcel_IOFactory::createWriter($excel,"Excel2007");
$file->save($dir.'demo1.xlsx');
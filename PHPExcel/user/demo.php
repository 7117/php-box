<?php
include "../Classes/PHPExcel.php";

$dir=dirname(__FILE__);

//先建立excel对象       new Excel()
//获取sheet            getActiveSheet()
//设置标题 设置表单值    setCellValue

//建立数组内容
//sheet加载内容数组fromArray()

//生成文件 使用createWriter
//保存文件 save()
$excel=new PHPExcel();
//获取sheet
$activeSheet=$excel->getActiveSheet();
//设置标题
$activeSheet->setTitle("demo");
//设置内容
$activeSheet->setCellValue("A1","内容")->setCellValue("B1","内容");
$activeSheet->setCellValue("A2","内容")->setCellValue("B2","内容");
//数组内容
$arr=[
    [],
    [],
    ['姓名','成绩'],
    ['上午','下午'],
    ['上午','下午','','中午']
];
//加载数组
$activeSheet->fromArray($arr);
//生成文件
$file=PHPExcel_IOFactory::createWriter($excel,"Excel2007");
//保存文件
$file->save($dir.'demo1.xlsx');
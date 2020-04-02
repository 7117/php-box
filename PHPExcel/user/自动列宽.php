<?php
include "../Classes/PHPExcel.php";

$dir=__DIR__;
$excel=new PHPExcel();
//获取sheet
$sheet=$excel->getActiveSheet();
//设置标题
$sheet->setTitle("demo");
$str_a="aaaaaaaaaaaaa";
$str_b='b';
$len_a = strlen(iconv('utf-8','gb2312',$str_a));
$len_b = strlen(iconv('utf-8','gb2312',$str_b));
//设置内容
$len_a = strlen(iconv('utf-8','gb2312',$str_a));
$sheet->setCellValue("A1",$str_a)->setCellValue("B1",$str_b);
$sheet->getColumnDimension("A")->setWidth($len_a);
$sheet->getColumnDimension("B")->setWidth($len_b);
//生成文件
$file=PHPExcel_IOFactory::createWriter($excel,"Excel2007");
//保存文件
$file->save($dir.'aaaaaaa.xlsx');
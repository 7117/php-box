<?php

$dir=dirname(__FILE__);
include $dir.'.\..\Classes\PHPExcel\IOFactory.php';
$name=$dir.'.\..\read.xlsx';
// 一次性全部获取
// $excel=PHPExcel_IOFactory::load($name);
// 全部的获取
// 一次性进行分别获取指定的sheet
$type=PHPExcel_IOFactory::identify($name);
$read=PHPExcel_IOFactory::createReader($type);
$sheetname=['2年级','3年级'];
$read->setLoadSheetsOnly($sheetname);
$excel=$read->load($name);
$count=$excel->getSheetCount();
$data=[];
for($i=0;$i<$count;$i++){
    $data[]=$excel->getSheet($i)->toArray();
}

var_dump($data);
echo "<br>";
echo "<br>";
echo "<br>";

// 分步进行获取
foreach($excel->getWorksheetIterator() as $sheet){
    foreach($sheet->getRowIterator() as $row){
        if($row->getRowIndex()<2){
            continue;
        }
        foreach($row->getCellIterator() as $cell){
            $data=$cell->getValue();
            echo $data." ";

        }
        echo "<br>";
    }
}


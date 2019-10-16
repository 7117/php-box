<?php
//1.进行指定哪一个excel PHPExcel_IOFactory::identify
//2.进行实例化读取器    PHPExcel_IOFactory::createReader($type)
//3.指定读取的sheet    $read->setLoadSheetsOnly($sheetname);
//4.进行加载文件        $excel=$read->load($name);
//5.获取sheet的个数    $count=$excel->getSheetCount()
//6.进行获取sheet输出   $excel->getSheet($i)->toArray()
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
//1.实例化excel
//2.进行获取全部sheet进行遍历
//3.进行获取全部row进行遍历
//4.进行获取每一个表格cell进行遍历
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


<?php
include "./dbfunc.php";
include "../Classes/PHPExcel.php";

$dir=dirname(__FILE__);

$excel=new PHPExcel();

for($i=1;$i<=3;$i++){
    if($i>1){
        $excel->createSheet();
    }
    $excel->setActiveSheetIndex($i-1);
    $sheet=$excel->getActiveSheet();
    $sheet->setTitle($i."年级");
    $data=$db->getData($i);
    $sheet->setCellValue("A1","姓名")->setCellValue("B1","分数")->setCellValue("C1","班级");
    $j=2;
    foreach($data as $k=>$v){
        $sheet->setCellValue("A".$j,$v['username'])
              ->setCellValue("B".$j,$v['score'])
              ->setCellValue("C".$j,$v['class']);
        $j++;
    }
}

$write=PHPExcel_IOFactory::createWriter($excel,'Excel5');
// $write->save($dir."./../export.xlsx");//输出文件
exportBroswer('Excel5','broswerExcel.xls');
$write->save("php://output");

function exportBroswer($type,$name){
    if($type=="Excel5"){
        header('Content-Type: application/vnd.ms-excel');
    }else{
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
    header('Content-Disposition: attachment;filename="'.$name.'"');
    header('Cache-Control: max-age=0');
}



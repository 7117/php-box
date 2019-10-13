<?php
include "./dbfunc.php";
include "../Classes/PHPExcel.php";

$dir=dirname(__FILE__);
$excel=new PHPExcel();
//年级
$grade=$db->getAllGrades();
$sheet=$excel->getActiveSheet();
//设置居中
$sheet->getDefaultStyle()->getAlignment()
    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//现在获取的是一个年级的一个班级的学生的所有的数据
$index=0;
foreach ($grade as $k=>$v){
    $gradeindex=getCell($index*2);
    $sheet->setCellValue($gradeindex."2","高".$v['grade']);
    $class=$db->getClassByGrade($v['grade']);
    foreach($class as $c_k=>$c_v){
        $nameindex=getCell($index*2);
        $scoreindex=getCell($index*2+1);
        $sheet->mergeCells($nameindex."3:".$scoreindex."3");
        $info=$db->getStudentByClass($c_v['class'],$v['grade']);
        $sheet->setCellValue($nameindex."3",$c_v['class'].'班');
        $sheet->setCellValue($nameindex."4","姓名")
            ->setCellValue($scoreindex."4","成绩");
        $j=5;
        foreach($info as $k=>$v){
            $sheet->setCellValue($nameindex.$j,$v['username'])
                ->setCellValue($scoreindex.$j,$v['score']);
            //行数
            $j++;
        }
        $index++;
    }
    $endindex=getCell($index*2-1);
    $sheet->mergeCells($gradeindex."2:".$endindex."2");
}

$write=PHPExcel_IOFactory::createWriter($excel,'Excel5');
// $write->save($dir."./../export.xlsx");//输出文件
exportBroswer('Excel5','broswerExcel.xls');//输出到浏览器
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

function getCell($index){
    $arr=range('A','Z');
    return $arr[$index];
}



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
//设置字体
$sheet->getDefaultStyle()->getFont()->setName('宋体')->setSize(10);//默认字体
$sheet->getStyle("A2:Z2")->getFont()->setName('微软雅黑')->setSize(15)->setBold(true);//第二行
//现在获取的是一个年级的一个班级的学生的所有的数据
$index=0;
foreach ($grade as $k=>$v){
    $gradeindex=getCell($index*2);
    $sheet->setCellValue($gradeindex."2","高".$v['grade']);
    $class=$db->getClassByGrade($v['grade']);
    foreach($class as $c_k=>$c_v){
        $nameindex=getCell($index*2);
        $scoreindex=getCell($index*2+1);
        //填充设置标题
        $sheet->setCellValue($nameindex."3",$c_v['class'].'班');
        //设置填充颜色
        $sheet->getStyle($nameindex."3")->getFill()
              ->setFillType(PHPEXCEL_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');
        //设置边框
        $classborder=getBorder('00ff33');
        $sheet->getStyle($nameindex."3:".$scoreindex."3")->applyFromArray($classborder);
        //合并单元格
        $sheet->mergeCells($nameindex."3:".$scoreindex."3");
        //换行设置
        $sheet->getStyle($nameindex)->getAlignment()->setWrapText(true);
        $sheet->getStyle($scoreindex)->getAlignment()->setWrapText(true);
        $sheet->setCellValue($nameindex."4","姓名\n")
            ->setCellValue($scoreindex."4","成绩\n");
        //填充数据
        $info=$db->getStudentByClass($c_v['class'],$v['grade']);
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
    //合并
    $sheet->mergeCells($gradeindex."2:".$endindex."2");
    //设置填充颜色
    $sheet->getStyle($gradeindex."2")->getFill()
        ->setFillType(PHPEXCEL_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('ffff66');
    //设置边框
    $gradeborder=getBorder('e3df51');
    $sheet->getStyle($gradeindex."2:".$endindex."2")->applyFromArray($gradeborder);
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

//获取字符
function getCell($index){
    $arr=range('A','Z');
    return $arr[$index];
}

//获取边框 方式在4.6.18
function getBorder($color){
    $style=[
        'borders'=>[
            'outline'=>[
                'style'=>PHPExcel_Style_Border::BORDER_THICK,
                'color'=>['rgb'=>$color],
            ],
        ],
    ];
    return $style;
}



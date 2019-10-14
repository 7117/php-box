<?php
include "./dbfunc.php";
include "../Classes/PHPExcel.php";

$dir=dirname(__FILE__);
$excel=new PHPExcel();
$sheet=$excel->getActiveSheet();
$sheet->mergeCells("B10:H10");

/**
 * 插入文字块
 */
$text=new PHPExcel_RichText();
$text->createText("文文文文文文");
//可以添加样式的蚊子块
$font=$text->createTextRun("的的的的的的的");
//添加样式
$font->getFont()
    ->setSize(16)
    ->setBold(True)
    ->setColor(new PHPExcel_Style_Color(PHPExcel_Style_color::COLOR_GREEN));

$text->createText("荣荣荣荣荣荣荣荣荣荣");
$sheet->getCell("B10")->setValue($text);


/**
 * 添加批注
 */
$sheet->getComment("B10")->getText()->createTextRun("VAN\r\nVAN\r\n");

/**
 * 插入图片
 */
$img=new PHPExcel_Worksheet_Drawing();
$img->setPath(dirname($dir)."/aa.png");
$img->setWorksheet($sheet);
//左上角起点
$img->setCoordinates("A12");
//设置宽度
$img->setWidth(500);
$img->setOffsetX(5);
$img->setOffsetY(5);


/**
 * 表格的数据的处理
 */
//年级
$grade=$db->getAllGrades();
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
    $gradeindex=getCellContent($index*2);
    $sheet->setCellValue($gradeindex."2","高".$v['grade']);
    $class=$db->getClassByGrade($v['grade']);
    foreach($class as $c_k=>$c_v){
        $nameindex=getCellContent($index*2);
        $scoreindex=getCellContent($index*2+1);
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
            if($scoreindex.$j=='B5'){
                //设置不按照科学计数法进行计数  全部进行显示
                $sheet->setCellValue($nameindex.$j,$v['username'])
                    ->setCellValueExplicit($scoreindex.$j,"111111111111111",PHPExcel_Cell_DataType::TYPE_STRING);
            }else{
                $sheet->setCellValue($nameindex.$j,$v['username'])
                    ->setCellValue($scoreindex.$j,$v['score']);
            }
            //行数
            $j++;
        }
        $index++;
    }
    $endindex=getCellContent($index*2-1);
    //合并
    $sheet->mergeCells($gradeindex."2:".$endindex."2");
    //设置填充颜色
    $sheet->getStyle($gradeindex."2")->getFill()
        ->setFillType(PHPEXCEL_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('ffff66');
    //设置边框
    $gradeborder=getBorder('e3df51');
    $sheet->getStyle($gradeindex."2:".$endindex."2")->applyFromArray($gradeborder);
}

$write=PHPExcel_IOFactory::createWriter($excel,'Excel2007');
// $write->save($dir."./../export.xlsx");//输出文件
exportBroswer('Excel2007','broswerExcel.xlsx');//输出到浏览器
$write->save("php://output");

//进行输出到浏览器
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
function getCellContent($index){
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
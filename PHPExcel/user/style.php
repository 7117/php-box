<?php
include "./dbfunc.php";
include "../Classes/PHPExcel.php";
//新建excel类new Excel 设置活动sheet-getActiveSheet
//设置全局属性：getDefaultStyle()
    //设置水平居中setVertical 垂直居中setHorizontal
    //设置字体属性getStyle()->getFont()
//设置部分值：遍历循环getStyle("")
    //获取db值，进行设置值setCellValue()
    //设置样式 getStyle()
    //设置样式填充 getStyle()->getFill()
    //设置边框 getStyle()->getBorder()->setBorderStyle()
    //合并单元格mergeCell()
//进行输出至浏览器
    //content-type
    //cache-control
    //Content-Disposition: attachment
$dir=dirname(__FILE__);
$excel=new PHPExcel();
//获取数据年级
$grade=$db->getAllGrades();
$sheet=$excel->getActiveSheet();
//设置居中：采用的是常量的方式进行设置的
$sheet->getDefaultStyle()->getAlignment()
    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//设置字体：设置字体 style->类型font->设置具体的属性
$sheet->getDefaultStyle()->getFont()->setName('宋体')->setSize(10);//默认字体
$sheet->getStyle("A2:Z2")->getFont()->setName('微软雅黑')->setSize(15)->setBold(true);//第二行
//现在获取的是一个年级的一个班级的学生的所有的数据
$index=0;
foreach ($grade as $k=>$v){
    //这个是进行获取
    $gradeindex=getCell($index*2);
    $sheet->setCellValue($gradeindex."2","高".$v['grade']);
    $class=$db->getClassByGrade($v['grade']);
    foreach($class as $c_k=>$c_v){
        //进行获取坐标
        $nameindex=getCell($index*2);
        $scoreindex=getCell($index*2+1);
        //填充设置标题
        $sheet->setCellValue($nameindex."3",$c_v['class'].'班');
        //设置填充颜色
        $sheet->getStyle($nameindex."3")->getFill()
            ->setFillType(PHPEXCEL_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');
        //设置边框  这个是数组设置的
        $classborder=getBorder('00ff33');
        $sheet->getStyle($nameindex."3:".$scoreindex."3")->applyFromArray($classborder);
        //合并单元格
        $sheet->mergeCells($nameindex."3:".$scoreindex."3");
        //换行设置：允许换行 进行填充换行数据
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



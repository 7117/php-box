<?php
include "./dbfunc.php";
include "../Classes/PHPExcel.php";

$dir=dirname(__FILE__);

$excel=new PHPExcel();

//思路：每个sheet分别进行填充
// 新建excel
// 新建sheet 设置当前的sheet
// 设置title
// 从数据库进行获取数据
// 设置值
// 设置填充数据
// 生成文件
// 浏览器进行输出保存
for($i=1;$i<=3;$i++){
    if($i>1){
        //新建sheet
        $excel->createSheet();
    }
    //设置sheet
    $excel->setActiveSheetIndex($i-1);
    //获取sheet
    $sheet=$excel->getActiveSheet();
    //设置title
    $sheet->setTitle($i."年级");
    //获取数据
    $data=$db->getData($i);
    //设置值
    $sheet->setCellValue("A1","姓名")->setCellValue("B1","分数")->setCellValue("C1","班级");
    //进行填充数据
    $j=2;
    foreach($data as $k=>$v){
        $sheet->setCellValue("A".$j,$v['username'])
              ->setCellValue("B".$j,$v['score'])
              ->setCellValue("C".$j,$v['class']);
        $j++;
    }
}
//生成文件
$write=PHPExcel_IOFactory::createWriter($excel,'Excel5');
//进行使用浏览器进行保存
exportBroswer('Excel5','broswerExcel.xls');
$write->save("php://output");

function exportBroswer($type,$name){
    if($type=="Excel5"){
        //内容的格式
        header('Content-Type: application/vnd.ms-excel');
    }else{
        //07版本的
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
    //设置附件的名字
    header('Content-Disposition: attachment;filename="'.$name.'"');
    //不缓存
    header('Cache-Control: max-age=0');
}



<?php
//编辑空间管控/Api/sp/editspa
public function editspaAction()
{
    $s_time = microtime(true);
    global $UserInfo ;


	// 进行获取各种参数
    $datas = trim(file_get_contents('php://input'));

    if (empty($datas)) {
        $result = array('code' => '4', 'message' => '参数错误');
        echo json_encode($result);
        die();
    }
    $row_info = json_decode($datas, true);

    $row = $row_info['params'][0]['select_item'];
    $data_type = $row_info['params'][0]['data_type'];
    //批量操作增幅
    $sales_growth = $row_info['params'][0]['sales_growth'];
    $store_num = $row_info['params'][0]['store_num'];
    $ed_start = $row_info['params'][0]['ed_start'];
    $ed_end = $row_info['params'][0]['ed_end'];

    $new_data = $row_info['params'][0]['new_data'];


    // 处理数据
    //批量操作 过滤月份数组
    if($data_type == 5){
        foreach($new_data as $k3=>$v3){
            foreach($v3['children'] as $k4=>$v4){
                $resWeek[] = $v4;
            }
        }
        $new_data = $resWeek;
    }

    //$old_data = $row_info['params'][0]['old_data'];
    if(!$new_data[0]['brand_no']||!$new_data[0]['region_name']){
        $result = array('code' => '3', 'message' => '参数错误');
        echo json_encode($result);
        die();
    }

    $log_info = array();
    $log_info['updatetime'] = date('Y-m-d H:i:s');
    $log_info['userid'] = $UserInfo[0]['userid'];
    $log_info['sureName'] = $UserInfo[0]['sureName'];
    $log_info['updatedate'] = date('Y-m-d');
    $log_info['updateweek'] = date('W');
    $log_info['content'] = serialize($row);
    $log_info['remark'] = serialize($row_info['params'][0]);
    $log_info['region_name'] = $new_data[0]['region_name'];
    $log_info['city'] = $new_data[0]['city'];
    $log_info['brand_no'] = $new_data[0]['brand_no'];
    //$log_info['product_year_name'] = $row['product_year_name'];
    $log_info['product_season_name'] = $row['product_season_name'];
    $log_info['category_name'] = $row['category_name'];

    $this->checkPermit($UserInfo,$log_info);
    //插入日志记录
    $tid = $this->_model->addLogTask($log_info);

    foreach($new_data as $k=>$v){
        $info = array();
        //编辑信息

        $info['tid'] = $tid;
        $info['region_name'] = $v['region_name'];
        $info['city'] = $v['city'];
        $info['brand_no'] = $v['brand_no'];
        //$info['product_year_name'] = $row['product_year_name'];
        $info['product_season_name'] = $row['product_season_name'];
        $info['category_name'] = $row['category_name'];
        $info['week_in_year'] = $v['week_in_year'];
        $info['ed'] = $v['ed'];

        //$info['discount_plan'] = $v['discount']/100;
        if($data_type == 1){
            //系统推荐
            if($row['is_rec'] == 1){
                if(is_numeric($v['rep_space'])){
                    $info['rep_space_rec'] = $v['rep_space'];
                }
            }else{
                if(is_numeric($v['rep_space'])){
                    $info['rep_space'] = $v['rep_space'];
                }
            }

            if(is_numeric($v['sales_growth'])){
                $info['sales_growth'] = $v['sales_growth']/100;
            }
            if(is_numeric($v['store_num'])){
                $info['store_num'] = $v['store_num'];
            }
            $info['store_stock'] = '';

        }elseif($data_type==2){
            if(is_numeric($v['sales_growth'])){
                $info['sales_growth'] = $v['sales_growth']/100;
            }
            //$info['store_num'] = '';
            $info['store_stock'] = '';

        }elseif($data_type==3){
            if(is_numeric($v['store_num'])){
                $info['store_num'] = $v['store_num'];
            }
            $info['store_stock'] = '';
            //$info['sales_growth'] = '';

        }elseif($data_type==4){
            if(is_numeric($v['store_num'])){
                $info['store_num'] = $v['store_num'];
            }
            if(is_numeric($v['sales_growth'])){
                $info['sales_growth'] = $v['sales_growth']/100;
            }
            $info['store_stock'] = '';

        }elseif($data_type==5){
            if(is_numeric($sales_growth)){
                $info['sales_growth'] = $sales_growth/100;

            }
            if(is_numeric($store_num)){
                $info['store_num'] = $store_num;
            }
            $info['store_stock'] = '';

        }
        $infos[] = $info;
        $info['userid'] = $UserInfo[0]['userid'];
        $info['sureName'] = $UserInfo[0]['sureName'];
        $info['updatetime'] = date('Y-m-d H:i:s');
        $info['updatedate'] = date('Y-m-d');
        $info['updateweek'] = date('W');
        $info['content'] = serialize($v);
        if($data_type==5){//批量操作增幅
            if(strtotime($v['ed']) >= strtotime($ed_start) && strtotime($v['ed'])<= strtotime($ed_end)){
                $check = '';
                $check = $this->_model->getLog($info);
                if(!$check){
                    $flag = $this->_model->addLog($info);
                }else{
                    $flag = $this->_model->editLog($info);
                }
            }

        }else{
            $check = '';
            $check = $this->_model->getLog($info);
            if(!$check){
                $flag = $this->_model->addLog($info);
            }else{
                $flag = $this->_model->editLog($info);
            }
        }

        /*
        增幅 -- 影响销量 预计销量就=18销量*（1+销量增幅） 预计销量  -- 预估销售额

        期末售罄率--影响预测每周的售罄率（线性计算）-=累计销量/（累计销量+模拟库存），累计销量不变，模拟库存变了，推荐订单量变化

        补货空间--推荐订单量变化，模拟到货变化，安全库存缺口变化，模拟期末库存变化
        1.只是修改铺店数  影响 单店存 =模拟期末库存/计划总铺店数  影响安全库存=店数*单店存
        2.只是修改单店存  影响安全库存=店数*单店存
        3.两个都修改     影响安全库存=店数*单店存
        */
    }
    //所有操作日志记录0716
    if($flag){
        $info_new['userid'] = $UserInfo[0]['userid'];
        $info_new['sureName'] = $UserInfo[0]['sureName'];
        $info_new['name'] = '批量编辑数据';
        $info_new['url'] = 'editspa';
        $info_new['region_name'] = $info['region_name'];
        $info_new['city'] = $info['city'];
        $info_new['brand_no'] = $info['brand_no'];
        //$info['product_year_name'] = $row['product_year_name'];
        $info_new['product_season_name'] = $row['product_season_name'];
        $info_new['category_name'] = $row['category_name'];
        $info_new['content'] = serialize($infos);
        $this->_model->addSpaRecord($info_new);
    }

    //记录操作日志
    $e_time = microtime(true);
    $use_time = $e_time-$s_time;
    if ($flag) {
        $result = array('code' => '0', 'message' => '成功');
        $result['data'] = $flag;
        $result['use_time'] = $use_time;
        echo json_encode($result);
    } else {
        $result = array('code' => '2', 'message' => '没有数据');
        $result['use_time'] = $use_time;
        echo json_encode($result);
        die();
    }
}

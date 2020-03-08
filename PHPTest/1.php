//铺货深度	库存/存店数
$arr[$k]['puhuo_depth'] = round($v['puhuo_depth'],2);

//【五周后单店存】=【五周后库存】/【五周后店数】
$arr[$k]['single_store_save_pre'] =round($arr[$k]['five_week_inv']/$arr[$k]['five_week_store'],2);


<?php
namespace app\controllers;

use app\components\SdkResponse;
use app\models\TfEvent;
use app\models\TfRes;
use app\models\TfTagChid;
use app\models\TfTagResid;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Cookie;
use OSS\Core\OssException;
use OSS\OssClient;

class TfResController extends CmController {
    const COOKIE_NAME_TFRES_SEARCH = 'tfres-search';

//    public function actionShow(){
//
//    }

    public function actionIndex() {
        if(Yii::$app->request->isAjax){
            $hidden_tfuids = trim(Yii::$app->request->post('hidden_tfuids'));
            return $hidden_tfuids;
        };

        $gets = Yii::$app->request->get();

        if(empty($gets)) $gets = json_decode(Yii::$app->request->cookies->get(self::COOKIE_NAME_TFRES_SEARCH), true);

        $where = ['status' => 1];
        $where1 = $where2 = $where3 = $where4 = $where5 = [];
        if (!empty($gets['product_slt']) && $gets['product_slt'] != 'all') {
            $product_id = $gets['product_slt'];
            $where1 = ['product_id' => $product_id];
        } else {
            $product_id = 0;
        }
        if(isset($gets['type']) && $gets['type'] != 'all') {
            $type = (int)$gets['type'];
            $where2 = ['type' => $type];
        } else {
            $type = 'all';
        }
        if(isset($gets['tag']) && $gets['tag'] != 'all') {
            $tag = (string)$gets['tag'];
            $where3 = $tag == '' ? ['tags' => ''] : ['like', 'tags', ',' . $tag . ','];
        } else {
            $tag = 'all';
        }

        if(isset($gets['keyword']) && $gets['keyword'] != '') {
            $keyword = trim($gets['keyword']);
            $where4 = ['like', 'name', $keyword];
        } else {
            $keyword = '';
        }
        if(isset($gets['orderby'])) {
            $orderby = $gets['orderby'];
        } else {
            $orderby = 'id DESC';
        }

        if(isset($gets['tfuid']) && $gets['tfuid'] != '') {
            $tfuid = (int)$gets['tfuid'];
            $where5 = ['type' => $tfuid];
        } else {
            $tfuid = '';
        }


        $query = TfRes::find()->where($where)->andWhere($where1)->andWhere($where2)->andWhere($where3)->andWhere($where4)->andWhere($where5);

        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize' => 30]);
        $ress = $query->orderBy($orderby)->addOrderBy($orderby != 'id ASC' ? 'id DESC' : '')->offset($pagination->offset)->limit($pagination->limit)->with('product')->with('creater')->all();


        $tags = TfTagResid::getAllTags(empty($product_id) ? null : $product_id);


        Yii::$app->response->cookies->add(new Cookie([
            'name' => self::COOKIE_NAME_TFRES_SEARCH,
            'value' => json_encode($gets),
            'expire' => time() + 31536000,
            'path' => '/tf-res'
        ]));

        //获取所有的需求人
        $tfuids= new TfRes();
        $tfuids=$tfuids->getAllTfer();

        //获取所有的设计师
        $dsuids= new TfRes();
        $dsuids=$dsuids->getAllDser();


        return $this->render('index', [
            's_product_id' => $product_id,
            's_type' => $type,
            's_tag' => $tag,
            's_keyword' => $keyword,
            'orderby' => $orderby,
            'tags' => $tags,
            'tfuids'=>$tfuids,
            'dsuids'=>$dsuids,
            'ress' => $ress,
            'res_domain' => Yii::$app->params['oss_nbres']['cname'],
            'pagination' => $pagination,
            'oss_info' => $this->makeOSSInfo()
        ]);
    }

    public function actionAddSubmit() {
        $post = Yii::$app->request->post();

        $res = new TfRes();
        $res->load($post, '');
        $res->cuid = $this->_uid;

        try {
            $oss = new OssClient(
                Yii::$app->params['oss_nbres']['accessKeyId'],
                Yii::$app->params['oss_nbres']['accessKeySecret'],
                Yii::$app->params['oss_nbres']['endpoint_internal']
            );

            $meta = $oss->getObjectMeta(Yii::$app->params['oss_nbres']['bucket'], $res->content);

            $res->md5 = bin2hex(base64_decode($meta['content-md5']));

            $exists_res = TfRes::find()->select(['id', 'name', 'ctime'])->where(['md5' => $res->md5])->asArray()->one();
            if($exists_res) {
                $oss->deleteObject(Yii::$app->params['oss_nbres']['bucket'], $res->content);

                return SdkResponse::output(SdkResponse::RESP_ORDER_REPEAT, $exists_res);
            }
        } catch (OssException $e) {
            return SdkResponse::output(SdkResponse::RESP_NETWORK_ERROR, [], $e->getErrorMessage());
        }

        $max_resid = (int)TfRes::find()->count();
        $max_self_resid = (int)TfRes::find()->where(['cuid' => $this->_uid])->count();
        $realname = User::find()->select('realname')->where(['uid' => $this->_uid])->scalar();

        $res->name = str_pad($max_resid + 1, 4, '0', STR_PAD_LEFT) . '-' . $realname .
                    str_pad($max_self_resid + 1, 3, '0', STR_PAD_LEFT);

        if($res->save()) {
            return SdkResponse::output(SdkResponse::RESP_SUCC);
        } else {
            return SdkResponse::output(SdkResponse::RESP_SYSTEM_BUSY, $res->getErrors());
        }
    }

    public function actionEditSubmit() {
        $id = (int)Yii::$app->request->post('id');

        $res = TfRes::findOne($id);
        if(empty($res)) return SdkResponse::output(SdkResponse::RESP_NOT_FOUND);

        $tags_old = $res->getTagsArray();

        $res->load(Yii::$app->request->post(), '');
        $res->upuid = $this->_uid;

        $tags_new = $res->getTagsArray();
        $res->tags = ',' . implode(',', $tags_new) . ','; //过滤下重新写入

        //需要保留的原数据
        $intersect_tags = array_intersect($tags_old, $tags_new);
        //return var_dump($tags_old, $tags_new, $intersect_tags, array_diff($tags_old, $intersect_tags), array_diff($tags_new, $intersect_tags));

        //删除不保留的
        foreach(array_diff($tags_old, $intersect_tags) as $tag) {
            $tag_resid = TfTagResid::findOne(['tag' => $tag, 'resid' => $id]);
            if($tag_resid) $tag_resid->delete();
        }

        //增加新加的tag
        foreach(array_diff($tags_new, $intersect_tags) as $tag) {
            $tag_resid = new TfTagResid(['tag' => $tag, 'resid' => $id, 'cuid' => $this->_uid]);
            $tag_resid->save();
        }

        if($res->save()) {
            return SdkResponse::output(SdkResponse::RESP_SUCC);
        } else {
            return SdkResponse::output(SdkResponse::RESP_SYSTEM_BUSY, $res->getErrors());
        }
    }

    public function actionDelSubmit() {
        $id = (int)Yii::$app->request->post('id');
        $res = TfRes::findOne($id);
        if(empty($res)) return SdkResponse::output(SdkResponse::RESP_NOT_FOUND);
        $res->status = -1;
        $res->upuid = $this->_uid;
        if($res->save()) {
            //清空推广计划中的此素材配置
            foreach(TfEvent::find()->where(['resid' => $id])->each(100) as $event) {
                $event->resid = null;
                $event->save();
            }

            return SdkResponse::output(SdkResponse::RESP_SUCC);
        } else {
            return SdkResponse::output(SdkResponse::RESP_SYSTEM_BUSY, $res->getErrors());
        }
    }

    protected function makeOSSInfo() {
        $id= Yii::$app->params['oss_nbres']['accessKeyId'];
        $key= Yii::$app->params['oss_nbres']['accessKeySecret'];
        $host = Yii::$app->params['oss_nbres']['endpoint'];
        $dir = 'tfres/';
        $maxFileByteSize = 3145728000; //最大包文件大小
        $maxSignExpireTime = 86400; //设置该policy超时时间秒数. 即这个policy过了这个有效时间，将不能访问

        $end = time() + $maxSignExpireTime;
        $condition = array(0 => 'content-length-range', 1 => 0, 2 => $maxFileByteSize);
        $conditions[] = $condition;

        //表示用户上传的数据,必须是以$dir开始, 不然上传会失败,这一步不是必须项,只是为了安全起见,防止用户通过policy上传到别人的目录
        $start = array(0 => 'starts-with', 1 => '$key', 2 => $dir);
        $conditions[] = $start;

        $arr = array('expiration' => self::gmt_iso8601($end), 'conditions' => $conditions);
        $policy = json_encode($arr);
        $base64_policy = base64_encode($policy);
        $string_to_sign = $base64_policy;
        $signature = base64_encode(hash_hmac('sha1', $string_to_sign, $key, true));

        $response = array();
        $response['accessid'] = $id;
        $response['host'] = $host;
        $response['policy'] = $base64_policy;
        $response['signature'] = $signature;
        $response['expire'] = $end;
        $response['dir'] = $dir;

        return $response;
    }

    protected static function gmt_iso8601($time) {
        $dtStr = date("c", $time);
        $mydatetime = new \DateTime($dtStr);
        $expiration = $mydatetime->format(\DateTime::ISO8601);
        $pos = strpos($expiration, '+');
        $expiration = substr($expiration, 0, $pos);
        return $expiration."Z";
    }

    //获取OSS读取参数
//    protected function getOSSAccessParams() {
//        $OSSAccessKeyId = Yii::$app->params['oss_nbres']['accessKeyId'];
//        $Expires = time() + 86400;
//        $Signature = urlencode(base64_encode((hash_hmac('sha1', Yii::$app->params['oss_nbres']['accessKeySecret'], "VERB\n\n\n$Expires\n"))));
//
//        return "OSSAccessKeyId=$OSSAccessKeyId&Expires=$Expires&Signature=$Signature";
//    }

}
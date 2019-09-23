<?php
use app\components\CommonUtil;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\assets\FixedTableAsset;
use app\assets\DialogAsset;
use app\assets\UploaderAsset;
use app\assets\ViewerAsset;
use app\assets\FileSaverAsset;
use yii\widgets\LinkPager;
use yii\helpers\Html;


AppAsset::register($this);
FixedTableAsset::register($this);
DialogAsset::register($this);
UploaderAsset::register($this);
ViewerAsset::register($this);
FileSaverAsset::register($this);

$this->title = '投放管理 - 素材库';

$_csrf = Yii::$app->request->csrfToken;
$uploadSWFUrl = Url::base(true) . '/swf/Uploader.swf';
$this->registerJs(<<<JS
    $(document).ready(function() {
      
        $('.select2').select2({language: 'zh-CN'});//下拉框插件
    $('#img_res').viewer({button: false,navbar:true,toolbar:false,transition:false}); //图片查看插件
    
    $('select[name="product_slt"]:first').on('change', function(){
        $('#form_search').trigger('submit');
    });
    
    $('.btn-stypes').on('click', function() {
        $('#input_s_type').val($(this).attr('data-type'));
        
        $('.btn-stypes').removeClass('btn-primary').addClass('btn-default');
        $(this).addClass('btn-primary');
        
        $('#form_search').trigger('submit');
    });
    
    $('#btn_stags').on('click', function() {
        dialog({
            content: $('#div_stags'),
            quickClose: true,
            id: 'stags'
        }).show(this);
    });
    
    $('.div-btn-stag .btn').on('click', function() {
        var tag = $(this).attr('data-tag');
        $('#input_s_tag').val(tag);
        
        $('#stag').html(tag == 'all' ? '[全部]' : (tag == '' ? '[无]' : tag));
        $('.div-btn-stag .btn').removeClass('active');
        $(this).addClass('active');
        dialog.get('stags').close();
        
        $('#form_search').trigger('submit');
    });
    
    $('#select_orderby').on('change', function() {
        $('#form_search').trigger('submit');
    });
    
    $('#btn_upload').on('click', function() {
        if($('select[name="product_slt"]:first').val() == 'all') {
            dialog({
                title: false,
                quickClose: true,
                content: '上传素材必须先切换到某个具体的产品素材库!',
            }).show($('#btn_upload').get(0));
        } else {
            dialog({
                id: 'dialog_upload',
                title: false,
                quickClose: true,
                content: $('#div_upload'),
                width: Math.min($('.box:first').width() * 0.8, 600),
                onshow: function(){setTimeout(uploaderFn, 280);}
            }).show($('#btn_upload').get(0)); 
        }
        
        return false;
    });
    
    $('.btn-tag').on('click', function() {
        $('#input_s_tag').val($(this).attr('data-tag'));
        $('#form_search').trigger('submit');
        
        return false;
    });
    
    var uploader;
    var repeat_ress = [];
    function uploaderFn() {
        if(uploader) return;
        
        uploader = WebUploader.create({
            swf: '{$uploadSWFUrl}',
            server: '{$oss_info['host']}',
            pick: '#div_pick',
            accept: {title:'素材', extensions:'mp4,jpg,jpeg,png,gif', mimeTypes:'image/jpg,image/jpeg,image/png,image/gif,video/mp4'},
            auto: true,
            chunked: false,
            disableGlobalDnd: true,
            dnd: '#div_dnd',
            fileNumLimit: 100,
            threads: 1,
            formData: {
                OSSAccessKeyId: '{$oss_info['accessid']}',
                policy: '{$oss_info['policy']}',
                Signature: '{$oss_info['signature']}',
                success_action_status: '200'
                //'x-oss-object-acl': 'private'
            }
        });
        
        var uploadProgressFn = function(file, percentage) {
            var stats = uploader.getStats();
            $('#p_upload_ok').html('上传成功数：' + stats.successNum + '/' + (stats.successNum + stats.progressNum + stats.queueNum));
            
            
            $('#div_upload_curr').html('正在上传：' + file.name);
            var per = (percentage * 100).toFixed(2);
            $('#div_progress div').html(per + '%').css('width', per + '%');
        }
        
        uploader.on('uploadStart', function(file) {
            //console.log('uploadStart:', file);
            
            $('select[name="product_slt"]:first').attr('disabled', true);//禁用产品切换
            
            uploader.options.formData.key = '{$oss_info['dir']}' + file.source.uid.replace('client_', '') + '.' + file.ext.toLowerCase();

            $('#div_dnd').hide();
            uploadProgressFn(file, 0);
            $('#div_queue').show();
        });
        
        uploader.on('uploadProgress', uploadProgressFn);
        
        uploader.on('uploadSuccess', function(file, response){
            $.post('/tf-res/add-submit', 
                {
                    //name: file.name.substr(0, file.name.lastIndexOf('.')),
                    type:(file.type == 'video/mp4' ? 2 : 1),
                    content: uploader.options.formData.key,
                    byte: file.size,
                    product_id: $('select[name="product_slt"]:first').val(),
                    rname: file.name,
                    _csrf: "$_csrf"
                },
                function(json) {
                    //console.log(json, repeat_ress);
                    if(json.code == 600) { //素材重复
                        repeat_ress.push(json['data']);
                    }
                    
                    var stats = uploader.getStats();
                    if(stats.progressNum == 0 && stats.queueNum == 0) uploadFinishedFn();
                },
                'json'
            );
        });
        
        var uploadFinishedFn =  function() {
            var stats = uploader.getStats();
            $('#p_upload_ok').html('上传成功数：' + stats.successNum + '/' + (stats.successNum + stats.progressNum + stats.queueNum));
            
            console.log(repeat_ress);
            
            var html;
            if(repeat_ress.length > 0) {
                html = '<p>发现重复的素材，系统已忽略:</p>'
                
                for(var i in repeat_ress) {
                    var res = repeat_ress[i];
                    html += '<p class="text-muted"><code>' + res['name'] +'</code> 创建于'+ res['ctime'] +'</p>';
                }
            } else {
                html = '<p>所有素材已上传成功!</p>';
            }
            
            $('#div_upload_curr').html(html);
            
            $('#div_success').show();
            
            $('select[name="product_slt"]:first').attr('disabled', false);//重新启用产品切换
        };
    }
    
    //重新上传
    $('#btn_upload_again').on('click', function() {
        $('#div_success').hide();
        $('#div_queue').hide();
        $('#div_dnd').show();
        
        uploader.reset();
        repeat_ress = [];
        
        return false;
    });
    
    //上传OK
    $('#btn_upload_ok').on('click', function() {
        $('#form_search').trigger('submit');
        
        return false;
    });
    
    //点击素材面板中的编辑按钮
    $('.btn-edit').on('click', function() {
        var d = dialog.get('dialog_edit');
        if(d) d.remove();
        
        dialog({
                id: 'dialog_edit',
                title: '编辑 ' + $(this).attr('data-name'),
                content: $('#div_edit'),
                quickClose: true,
                cancel: false,
                width: Math.min($('.box:first').width() * 0.9, 400),
        }).show($(this).get(0));
        
        $('#input_id').val($(this).attr('data-id'));
        $('#input_name').val($(this).attr('data-name'));
        $('#input_tags').val($(this).attr('data-tags'));
        $('#hidden_tfuids').val($(this).attr('data-tfuid'));
        $('#hidden_dsuids').val($(this).attr('data-dsuid'));
        var hidden_tfuids=$('#hidden_tfuids').val();
        console.log(hidden_tfuids);
        var hidden_dsuids=$('#hidden_dsuids').val();
        console.log(hidden_dsuids);
       
        // var data= {
        //     hidden_tfuids:hidden_tfuids,
        //     hidden_dsuids:hidden_dsuids
        // };
        // console.log(data['hidden_tfuids']);
        // console.log(data['hidden_dsuids']);
        
        // $.ajax({
        //     'url':"tf-res/index",
        //     'method':'post',
        //     'data':{
        //         hidden_tfuids:hidden_tfuids
        //     },
        //     'type':'json',
        //     'success':function(res) {
        //         $('#input_tfuid option').each(function(key,val){ 
        //             if($(this).text()==res){
        //                 // $(this).attr("selected", true);
        //                 $("#input_tfuid").val(res).select2();
        //             };    
        //         })
        //         }
        //        
        // });
        
        $("#input_tfuid option").each(function(key,val){
            if($(this).text()==hidden_dsuids){
                var num=$(this).val();
                $("#input_tfuid").val(num).trigger('change');
            }
        });
         
        refresh_edit_tags_html();
        
        return false;
    });
    
    //刷新已选Tags的显示
    function refresh_edit_tags_html() {
        var tag_html = '';
        var tags = tags_split($('#input_tags').val());
        for(i in tags) {
            tag_html += '<button class="btn btn-info btn-xs btn_tag_remove" type="button" data-tag="'+ tags[i] +'" style="margin:1px;">'+ tags[i] +' <span class="fa fa-remove"></span></button>';
        }
        $('#div_edit_tags').html(tag_html);
        $('#input_tags').val(',' + tags.join(',') + ','); //前后都加上分隔符，想要移出元素时更方便
        
    }
    
    function tags_split(tags_string){
        return tags_string.split(',').filter(function(element,index,self){return element != '' && self.indexOf(element) === index;});
    }
    
    //输入新Tag后点击添加按钮
    $('#btn_new_tag').on('click', function() {
        var tag = $('#input_new_tag').val().replace(new RegExp(',', 'g'), '，');
        $('#input_tags').val($('#input_tags').val() + tag);
        refresh_edit_tags_html();
        

        return false;
    });
    
    //如果触发编辑表单的submit，相当于点新Tag的添加按钮
    $('#form_edit').on('submit', function(event) {
        return false;
    });
    
    //点击已选Tags中的Tag，移除自身
    $('#div_edit_tags').on('click', '.btn_tag_remove', function() {
        var tag = $(this).attr('data-tag');
        $('#input_tags').val($('#input_tags').val().replace(',' + tag + ',', ''));
        refresh_edit_tags_html();
        
        return false;
    });
    
    //点击快捷选择中的Tag
    $('#div_quick_tags').on('click', '.btn_quick_tag', function(){
        var tag = $(this).attr('data-tag').replace(new RegExp(',', 'g'), '，');
        $('#input_tags').val($('#input_tags').val() + tag);
        refresh_edit_tags_html();
        
        return false;
    });
    
    //点击删除素材
    $('#btn_del_res').on('click', function(){
        if(!confirm("确认要删除此素材吗？")) return false;
        
        var id = $('#input_id').val();
        $.post('/tf-res/del-submit', 
            {
                id: $('#input_id').val(),
                _csrf: "$_csrf"
            },
            function(data, textStatus, jqXHR) {
                if(data.code == 200) {
                    dialog.get('dialog_edit').remove();
                    $('#div_resid_' + id).remove();
                }
            },
            'json'
        );
        
        return false;
    });
    
    //点击保存
    $('#btn_edit_submit').on('click', function(){
        if($('#input_new_tag:focus').val() != undefined) {
            $('#btn_new_tag').trigger('click');
            return false;
        }
        var id = $('#input_id').val();
        var name = $('#input_name').val();
        console.log(name);
        var tags = $('#input_tags').val();
        var tags_array = tags_split(tags);
        var tfuid=$('#input_tfuid').val();
        console.log(tfuid);

        
        
        $.post('/tf-res/edit-submit', 
            {
                id: id,
                name: name,
                tags: tags,
                tf_uid:tf_uid,
                ds_uid:ds_uid,
                _csrf: "$_csrf"
            },
            function(data, textStatus, jqXHR) {
                if(data.code == 200) {
                    dialog.get('dialog_edit').close();
                    
                    $('#div_resid_' + id + ' .strong_name').html(name);
                    $('#div_resid_' + id + ' .btn-edit').attr('data-name', name);
                    $('#div_resid_' + id + ' img').attr('alt', name);
                    $('#div_resid_' + id + ' .btn-edit').attr('data-tags', tags_array.join(','));
                    
                    var html = '';
                    if(tags_array.length < 1) {
                        html = '<button class="btn btn-warning btn-xs btn-tag" data-toggle="tooltip" title="该素材还没有任何Tag标签信息" data-tag="">[无]</button>';
                    } else {
                        for(i in tags_array) {
                            html += '<button class="btn btn-info btn-xs btn-tag" data-tag="'+ tags_array[i] +'">'+ tags_array[i] +'</button>&nbsp;';
                        }
                    }
                    $('#div_resid_' + id + ' .div_tags').html(html);
                }
            },
            'json'
        );
        
        return false;
    });
    
    $('.main-sidebar').css('z-index', 0); //这个left nav的z-index在chrome下挡住我们的video控制条，暂不清楚设为0会对nav有何影响
    $('.video_res').on('play', function(event){
       $('.video_res').each(function(index){
           if(this != event.target) $(this).trigger('pause');
       });
    });
    
    $('.btn_download').on('click', function(){
        var resid = $(this).attr('data-id');
        var src = $('#btn_edit_' + resid).attr('data-src');
        var name = $('#btn_edit_' + resid).attr('data-name');
        saveAs(src + '?xhr=true', name);
        return false;
    });
    
    // 设置投放人 设计人输入框
    $("#input_tfuid").select2({
          placeholder: {
            id: '-1',
            text: '请输入需求人'
          },
    });
    $("#input_dsuid").select2({
          placeholder: {
            id: '-1', 
            text: '请输入设计人'
          },
    });
        
    });
JS
);
?>
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">素材库</h3>
    </div>

    <div class="box-body">
        <form id="form_search" class="form-inline pull-left" method="get" action="<?=Url::to(['/tf-res'])?>">
            <?php echo CommonUtil::productSelect($s_product_id ? $s_product_id : '');?>
            <div class="btn-group">
                <button type="button" class="btn <?=($s_type == 'all' ? 'btn-primary' : 'btn-default')?> btn-stypes" data-type="all">全部</button>
                <button type="button" class="btn <?=($s_type == '1' ? 'btn-primary' : 'btn-default')?> btn-stypes" data-type="1">图片</button>
                <button type="button" class="btn <?=($s_type == '2' ? 'btn-primary' : 'btn-default')?> btn-stypes" data-type="2">视频</button>
<!--                <button type="button" class="btn --><?//=($s_type == '0' ? 'btn-primary' : 'btn-default')?><!-- btn-stypes" data-type="0">文字</button>-->
            </div>
            <input type="hidden" name="type" id="input_s_type" value="<?=$s_type?>" />

            <button id="btn_stags" type="button" class="btn btn-info">Tag: <span id="stag"><?=(empty($s_tag) ? '[无]' : ($s_tag == 'all' ? '[全部]' : $s_tag))?></span> <span class="caret"></span></button>
            <input type="hidden" name="tag" id="input_s_tag" value="<?=$s_tag?>" />

            <div class="input-group">
                <input type="text" class="form-control" name="keyword" value="<?=$s_keyword?>" placeholder="关键词搜索">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
                </span>
            </div>

            <select class="form-control" name="orderby" id="select_orderby">
                <option value="id DESC"<?=($orderby == 'id DESC' ? ' selected' : '')?>>按入库时间倒序 ↧</option>
                <option value="id ASC"<?=($orderby == 'id ASC' ? ' selected' : '')?>>按入库时间升序 ↥</option>
                <option value="devices_num DESC"<?=($orderby == 'devices_num DESC' ? ' selected' : '')?>>按激活设备数倒序 ↧</option>
                <option value="pay_total DESC"<?=($orderby == 'pay_total DESC' ? ' selected' : '')?>>按充值金额数倒序 ↧</option>
            </select>
        </form>
        <button id="btn_upload" class="btn btn-primary pull-right"><span class="fa fa-upload"></span> 上传素材</button>
    </div>
</div>

<div class="row" id="img_res">
    <?php foreach($ress as $res):?>
        <!--   单独的一个框     -->
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2" id="div_resid_<?=$res->id?>">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-link btn-xs pull-right btn-edit" id="btn_edit_<?=$res->id?>" data-id="<?=$res->id?>" data-name="<?=Html::encode($res->name)?>" data-src="<?=$res_domain . '/' . $res->content?>" data-tags="<?=implode(',', $res->TagsArray)?>" data-ctime="<?=$res->ctime?>" data-cuser="<?=$res->creater->realname?>" data-tfuid="<?=$res->tfer->realname?>" data-dsuid="<?=$res->dser->realname?>" ><span class="fa fa-edit"></span> 编辑</button>
                    <div style="height:16px;line-height:16px;overflow: hidden;"><strong class="strong_name" data-toggle="tooltip" title="<?=Html::encode($res->name)?>"><?=Html::encode($res->name)?></strong></div>
                </div>
                <div class="box-body text-muted">
                    <?php if($res->type == 1):?>
                        <div style="border: 1px solid #000000;background-color: #000000;text-align: center; margin-bottom: 5px;width:100%;height:110px;overflow: hidden;"><img src="<?=$res_domain . '/' . $res->content?>" style="cursor:pointer;" height="100%" alt="<?=Html::encode($res->name)?>" /></div>
                    <?php else:?>
                        <div style="border: 1px solid #000000;background-color: #000000;text-align: center; margin-bottom: 5px;width:100%;height:110px;overflow: hidden;">
                            <video class="video_res" src="<?=$res_domain . '/' . $res->content?>" webkit-playsinline="true" playsinline="true" height="100%" controls="controls"><?=Html::encode($res->name)?></video>
                        </div>
                    <?php endif?>
                    <div style="margin-bottom: 5px;text-align: center;"><a href="/tf-chid-stat?resid=<?=$res->id?>" class="btn btn-link btn-xs" target="_blank"><span class="fa fa-industry"></span> 数据</a>  <a href="/tf-event?product_id=<?=$res->product_id?>&resid=<?=$res->id?>" class="btn btn-link btn-xs" target="_blank"><span class="fa fa-xing"></span> 计划</a> <button class="btn btn-link btn-xs btn_download" data-id="<?=$res->id?>"><span class="fa fa-download"></span> 下载</button></div>
                    <div>激活设备数: <?=$res->devices_num?></div>
                    <div>充值总金额: <?=$res->pay_total?></div>
                    <div>投放计划数: <?=$res->eventnum?></div>
                    <div style="margin-top: 10px;">产品: <?=$res->product->product_name?></div>
                    <div>创建: <?=$res->ctime?></div>
                    <div class="div_tags" style="height:22px;overflow:hidden;">
                        <?php if(empty($res->TagsArray)):?>
                            <button class="btn btn-warning btn-xs btn-tag" data-toggle="tooltip" title="该素材还没有任何Tag标签信息" data-tag="">[无]</button>
                        <?php else:?>
                            <?php foreach($res->TagsArray as $tag):?><button class="btn btn-info btn-xs btn-tag" data-tag="<?=$tag?>"><?=$tag?></button>&nbsp;<?php endforeach;?>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>

    <div class="clearfix col-md-12">
        <?=LinkPager::widget(['pagination' => $pagination, 'options' => ['class' => 'pagination pull-right']]);?>
    </div>
</div>

<div id="div_stags" style="display: none;max-width:430px;">
    <div class="form-group div-btn-stag">
        <button class="btn btn-default btn-xs<?=($s_tag=='all' ? ' active' : '')?>" data-tag="all">[全部]</button> <button class="btn btn-default btn-xs<?=($s_tag=='' ? ' active' : '')?>" data-tag="">[无]</button>
    </div>
    <div class="form-group-xs div-btn-stag">
        <?php foreach ($tags as $tag):?>
            <button class="btn btn-info btn-xs<?=($tag==$s_tag ? ' active' : '')?>" data-tag="<?=$tag?>" style="margin-bottom: 3px;"><?=$tag?></button>
        <?php endforeach;?>
    </div>
</div>

<div id="div_upload" style="display:none;border:3px dashed #e6e6e6;background-color:#f9f9f9;min-height:260px;">
    <div id="div_dnd" style="display:;text-align: center;min-height:260px;">
        <div id="div_pick" style="padding-top: 100px; margin-bottom: 20px;"><span class="fa fa-upload"> 点击选择文件...</span></div>
        <p>或将素材文件直接拖到这里</p>
    </div>
    <div id="div_queue" style="display:none;min-height:260px;padding:70px 20px 20px 20px;">
        <h4 id="p_upload_ok">上传成功数：1/100</h4>
        <div id="div_upload_curr">正在上传：aaaa.mp4</div>
        <div id="div_progress" class="progress">
            <div class="progress-bar" role="progressbar" style="width: 60%;">
                60%
            </div>
        </div>
        <div id="div_success" style="display:none; margin-top: 30px;text-align: right;">
            <button id="btn_upload_again" type="button" class="btn btn-default"><span class="fa fa-upload"></span> 继续上传</button>
            <button id="btn_upload_ok" type="button" class="btn btn-success"><span class="fa fa-check-circle"></span> 好的</button>
        </div>
    </div>
</div>

<div id="div_edit" style="display: none;">
    <form class="form-horizontal" id="form_edit">
        <!--  素材名称 -->
        <div class="form-group">
            <label for="input_name" class="col-sm-3 control-label input-sm">素材名称</label>
            <div class="col-sm-9">
                <input type="hidden" id="input_id" value="" />
                <input type="hidden" id="input_tags" value="" />
                <input type="hidden" id="hidden_tfuids" value="" />
                <input type="hidden" id="hidden_dsuids" value="" />
                <input type="text" class="form-control input-sm" id="input_name" maxlength="80" placeholder="素材名称" />
            </div>
        </div>

        <!--需求人-->
        <div class="form-group">
            <label for="input_name" class="col-sm-3 control-label input-sm">需求人</label>
            <div class="col-sm-9">
                <select class="form-control input-sm select2" maxlength="80" id="input_tfuid" value="" style="width:293px">
                    <?php foreach($tfuids as $key => $tfuname):?>
                        <option value="<?=$key?>"><?=$tfuname?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <!--设计师-->
        <div class="form-group">
            <label for="input_name" class="col-sm-3 control-label input-sm">设计师</label>
            <div class="col-sm-9">
                <select class="form-control input-sm select2" maxlength="80" id="input_dsuid" value="" style="width:293px">
                    <?php foreach($dsuids as $key => $dsuname):?>
                        <option value="<?=$key?>" ><?=$dsuname?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <!--   标签     -->
        <div class="form-group">
            <label class="col-sm-3 control-label input-sm">Tags</label>
            <div class="col-sm-9">
                <div>
                    <div id="div_edit_tags"></div>
                    <div class="input-group" style="margin-top: 10px;">
                        <input type="text" class="form-control input-sm" id="input_new_tag" value="" placeholder="新Tag" />
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm" type="button" id="btn_new_tag" ><span class="fa fa-plus"></span> 添加</button>
                        </span>
                    </div>
                </div>
                <div class="text-muted" id="div_quick_tags" style="border-top: 1px dashed #cccccc;margin-top: 10px;padding-top:10px;">快捷选择:&nbsp;
                    <?php foreach ($tags as $tag):?>
                        <button class="btn btn-default btn-xs btn_quick_tag" style="margin-bottom: 2px;" type="button" data-tag="<?=$tag?>"><?=$tag?></button>
                    <?php endforeach;?>

                </div>
            </div>
        </div>

        <!--    按钮操作    -->
        <div class="form-group">
            <div class="col-sm-3 input-sm"><button id="btn_del_res" type="button" class="btn btn-danger btn-block btn-sm"><span class="fa fa-recycle"></span> 删除素材</button></div>
            <div class="col-sm-9 input-sm"><button id="btn_edit_submit" type="submit" class="btn btn-primary btn-block btn-sm"><span class="fa fa-save"></span> 保 存 </button></div>
        </div>
    </form>
</div>
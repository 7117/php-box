/**
 * phpteach.com
 * 公共JS库类
 */
document.write("<script language=javascript src='"+HY.siteUrl+"/public/js/layer/layer.js'></script>");

//phpteach.com 公共类
var libs = {
    reloadPage: function(win) {
        var location = win.location;
        location.href = location.pathname + location.search;
    },
    redirect: function (url) {
        location.href = url;
    },
    topRedirect: function (url) {
        win.top.location.href = url;
    },
    back:function (e) {
        history.back();
    }
};

var HYLayer={
    alert: function (content, reFunction, btnText, title) {
        btnText = btnText || '关闭';
        title = title || '消息提醒';
        layer.alert(content, { closeBtn: 1, btn: [btnText], title: title, resize: false })
    },
    showLoading: function (time, style) {
        time = time || 0;
        style = style || 0;
        return layer.load(style, { shade: [0.6, '#ccc'], time: time });
    },
    closeLoading: function () {
        layer.closeAll('loading');
    },

    //phpteach.com 弹出提示 icon类型 0:带！的提示 1:√ 2:x 3:? 4:锁 5:难过脸 6:微笑脸
    showTips: function (content, icon, time, callback) {
        icon = icon || 0;
        time = time || 3000;
        layer.msg(content, {
            icon: icon,
            time: time,
            resize: false,
            shade: 0.5,
            shadeClose: true
        }, function () {
            //do something
            if (callback) {
                callback();
            }
        });
    },

    //phpteach.com JS confirm
    confirm: function (content, sureFunction, title, sureText, closeText, closeFunction) {
        title = title || "";
        sureText = sureText || "确定";
        closeText = closeText || "取消";

        layer.confirm(
            content, { title: title, icon: 3, btn: [sureText, closeText], resize: false },
            function (index) {//确定回调
                if (sureFunction) {
                    sureFunction();
                }
                layer.close(index);
            }, function (index) {//cancel回调
                if (closeFunction) {
                    closeFunction();
                }
                layer.close(index);
            });
    },

    openDialog: function (content, title, width, height) {
        title = title || "";
        width = width || 500;
        height = height || 360;

        var offset = ((window.screen.height - height) * 0.3) + 'px';

        return layer.open({
            title: title
            , content: content
            , type: 1
            , offset: offset
            , shade: 0.5
            , resize: false
            , area: [width + 'px', height + 'px']
        });
    },

    openIframe: function (url, title, width, height, refresh) {
        title = title || "";
        width = width || 600;
        height = height || 500;
        refresh = refresh || 1;
        var offset = ((window.screen.height - height) * 0.3) + 'px';

        return layer.open({
            title: title
            , content: url
            , type: 2
            //, skin: 'layui-layer-rim'
            , offset: offset
            , shade: 0.5 // 遮罩层透明度
            , resize: false
            , area: [width + 'px', height + 'px'],
            end: function () {
                if(refresh==1){
                    location.reload()
                }
            }
        });
    }
};

/**
 * phpteach.com
 * formsubmit
 * @param subBtn
 */
function formSubmit(subBtn){
    var btn = subBtn,
        text = btn.text(),
        form = btn.parents('form.ajaxForm');
    form.ajaxSubmit({
        url: btn.data('action') ? btn.data('action') : form.attr('action'),
        dataType: 'json',
        beforeSubmit: function () {
            btn.text(text + '..').prop('disabled', true);
            HYLayer.showLoading();
        },
        success: function (data) {
            btn.removeClass('disabled').text(text.replace('..', '')).parent().find('span').remove();
            HYLayer.closeLoading();
            if(data.status == undefined){
                HYLayer.alert(data.info);
            }
            if (data.status == 1) {
                if(data.isclose){//if iframe
                    if(data.url){
                        HYLayer.showTips(data.info,1,3000,function () {
                            parent.location.href = data.url;
                        })
                    }else{
                        HYLayer.showTips(data.info,1,3000,function () {
                            window.parent.location.reload();
                            var index = parent.layer.getFrameIndex(window.name);
                            setTimeout(function(){parent.layer.close(index);}, 1000);
                        })
                    }
                }else{
                    if(data.url){
                        HYLayer.showTips(data.info,1,3000,function () {
                            location.href = data.url;
                        })
                    }else{
                        HYLayer.showTips(data.info,1,3000,function () {
                            libs.reloadPage(window);
                        })
                    }
                }
            } else if (data.status == 0) {
                if(data.url){
                    HYLayer.showTips(data.info,2,2000,function () {
                        location.href = data.url;
                    })
                }else{
                    HYLayer.showTips(data.info,2);
                }
                btn.removeProp('disabled').removeAttr('disabled');
            }
        }
    });
}


/**
 * phpteach.com
 * AJAX Request
 * @param postArr
 * @param url
 */
function ajaxRequest(postArr,url,async) {
    var status,returnData;
    async = async || false;
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        async: async,
        data: postArr,
        beforeSend: function () {
            HYLayer.showLoading();
        },
        success: function (data) {
            if (data.status == 1) {
                status = true;
                returnData = data;
            } else {
                if (data.url) {
                    location.href = data.url;
                } else {
                    HYLayer.showTips(data.info, 2);
                }
            }
        },
        complete: function () {
            HYLayer.closeLoading();
        }
    });
    if (status)return returnData;
}

/**
 * phpteach.com
 * ajaxlink
 * @param url
 */
function ajaxLink(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        beforeSend: function () {
            HYLayer.showLoading();
        },
        success: function (data) {
            if(data.status==1){
                if(data.info){
                    if(data.url){
                        HYLayer.showTips(data.info,1,2000,function () {
                            location.href = data.url;
                        })
                    }else{
                        HYLayer.showTips(data.info,1,2000,function () {
                            libs.reloadPage(window);
                        })
                    }
                }
            }else{
                HYLayer.showTips(data.info, 2);
            }
        },
        complete: function () {
            HYLayer.closeLoading();
        }
    });
}

/**
 * phpteach.com
 * 公共的JQUERY操作
 */
;(function () {
    //phpteach.com ajaxLink操作
    $(".ajaxLink").on('click',function (e) {
        e.preventDefault();
        var url=$(this).attr('data-url');
        var _msg=$(this).attr('data-msg');
        var _status=false;
        if(_msg){
            HYLayer.confirm(_msg,function () {
                _status=true;
                ajaxLink(url)
            });
        }else{
            ajaxLink(url)
        }
    });

    //phpteach.com 提交留言
    $("#subBtn").on('click',function (e) {
        e.preventDefault();
        var titleExp=/^[\w\W]{3,20}$/,
            contentExp=/^[\w\W]{6,100}$/,
            _title=$("#title"),
            _content=$("#content");
        if(!titleExp.test(_title.val())){
            HYLayer.showTips('请填写留言主题,3-20个字符');
            return false;
        }
        if(!contentExp.test(_content.val())){
            HYLayer.showTips('请填写留言内容，6-100个字符');
            return false;
        }
        formSubmit($(this));
    });

    //reply dialog
    $(".reply").on('click',function (e) {
        e.preventDefault();
        var _url=$(this).data('url'),
            _title=$(this).data('title');
        HYLayer.openIframe(_url,_title,500,380);
    });


    //回复操作
    $("#replyBtn").on('click',function (e) {
        e.preventDefault();
        var contentExp=/^[\w\W]{6,100}$/,
            _content=$("#content");
        if(!contentExp.test(_content.val())){
            HYLayer.showTips('请输入回复内容，6-100个字符');
            return false;
        }
        formSubmit($(this));
    })


})(jQuery);
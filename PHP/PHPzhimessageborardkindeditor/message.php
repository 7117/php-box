<!DOCTYPE html>
<html>
    <head>
        <title>留言板</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" />
        <script src="kindeditor/kindeditor/kindeditor-all.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <style>
            #div1 div{height: 30px; line-height: 30px; padding-left: 10px; background: #f0f0f0; margin-bottom: 1px}
        </style>
        <script>
            var page=1;
            var num=8;
            function load(page){
                function showpage() {
                    //获取总页数
                    $.ajax({
                        async:false,//设置成同步 函数内部变量 外部可以取到
                        type:'get',
                        url:'totaldb.php',
                        data:{page:page,num:num},
                        dataType:'text',
                        success: function(data,status)
                        {
                            totalpage=data;
                        }
                    })
                    var result="";
                    //显示分页
                    result="<input type='button' id='prev' value='上一页'></input>";
                    result+='当前页：第'+page+'页/总共：'+totalpage+"页";
                    result+="<input type='button' id='next'value='下一页'></input>";
                    $('#page').html(result);
                    //单击下一页 page递增 实现翻页
                    $('#next').click(function(){
                        page++;
                        if(page>=totalpage)
                        {
                            page=totalpage;
                        }
                        load(page);
                    })
                    //单击上一页 page递减 实现翻页
                    $('#prev').click(function(){
                        page--;
                        if(page<=1)
                        {
                            page=1;
                        }
                        load(page);
                    })
                }
                       //获取内容
                  var str="";
                  $.ajax({
                       type:'get',
                       url:'messagedb.php',
                       data:{page:page,num:num},
                       dataType:'json',
                       success: function(data,status)
                       {
                            //{
                            //  "1":{"title":"t1","content":"c1"},
                            //  "2":{"title":"t2","content":"c2"},
                            //  "3":{"title":"t3","content":"c3"},
                            //}
                           str="";
                            $.each(data, function(key,value) {
                  str+="<div>"+[key]+":"+"标题:"+value.title+"-----"+"内容:"+value.content+"</div>";
                                  $("#div1").html(str);
               });
                       }
                   })
       showpage();
            }
            //加载方法
            $(function(){
                load(page);
                $("#btn1").click(function () {
 
                    var title=$("#title").val();
                    var content=$("#content").val();
                    $.post("insertdb.php",{title:title,content:content},function (data) {
                        if(data){
                            console.log(data);
                            alert("留言成功!");
                        }else{
                            alert("留言失败请重新输入!");
                        }
                        load(page);
                        location.href="message.php";
                    },"text")
 
 
                })
                $("#sousuo").click(function () {
                    str="";
                    var con=$("#con").val();
                    $.get("messagedb.php?content=sousuo",{con:con,page:page,num:num},function (data) {
                        $.each(data, function(key,value) {
                            str+="<div>"+[key]+":"+"标题:"+value.title+"-----"+"内容:"+value.content+"</div>";
                            $("#div1").html(str);
                        });
                    },"json")
                    showpage();
                })
            })
        </script>
        
    </head>
    <body>
        <div><h1>留言板</h1></div>
        <div>搜索:<input id="con" name="sousuo"><input id="sousuo" type="button" value="确定"></div>
        <br><div id="div1"></div>
        <div id="page"></div>
        <div>
            标题:<input type="text" id="title" name="title"><br>
            内容:<br><span><textarea name="content" rows="13" cols="80" id="content"></textarea>
                <script>
                    KindEditor.ready(function(K) {
                        window.editor = K.create('#content',{
                            afterBlur:function(){this.sync();}
                        })
                    });
                </script>
                </span>
            <input type="submit" name="dosub" id="btn1" value="上传留言">
        </div>
    </body>
</html>
function delPro(productid){
    $.ajax({
        url:"del.php",
        type:'post',
        data:{"productid":productid},
        dataType:"json",
        success:function(response){
            alert("1");
            $("#tr"+productid).remove();
        },
        error:function (response) {
            alert("2");
        }
    });
}
//ajax请求php脚本完成数据的添加 shop_cart
function addCart(productid){
    alert("点击购物车");
    var url = "addCart.php";
    var data = {"productid":productid, "num":parseInt($("#number").val())};
    var success= function(response){
        if(response.code==1){
            alert('加入购物车成功');
        }else{
            alert('加入购物车失败');
        }
    };
    $.post(url, data, success, "json");
}

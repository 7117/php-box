//离开input框的时候进行修改
function changeNum(productid, num){
    alert(productid);
    alert(num);
    //通过ajax将对应商品的数量进行修改操作
    var url = "changeNum.php";
    var data = {'productid':productid, 'num':num};
    var success = function(response){
        if(response.errno == 0){
            var price = ($("#product-"+productid).val())*($("#p-"+productid).html());
            $("#total-"+productid).html(price);
        }
    }
    $.post(
        url,
        data,
        success,
        "json");
}

function changeNum(productid, num) {
    $.ajax({
        url: "changeNum.php",
        data: {'productid': productid, 'num': num},
        type: 'post',
        success: function (response) {
            var price = (parseInt($("#" + productid).html())) * num;
            $("#total").html(price);
        },
        error: function (data) {
            alert("fail");
        }
    });
}

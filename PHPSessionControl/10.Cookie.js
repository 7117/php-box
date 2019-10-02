var Cookie= {
    set: function (k, v, ex) {
        if (ex) {
            var date = new Date();
            date.setTime(date.getTime() + ex * 24 * 60 * 60 * 1000);
            var exstr = "expires=" + date.toGMTString() + ';';
        } else {
            var exstr = "";
        }
        document.cookie = k + '=' + escape(v) + ";" + exstr;
    },
    get: function (k) {
        var getCookie = document.cookie.replace(/[ ]/g, '');
        var resarr = getCookie.split(';');
        var len = resarr.length;
        var res;
        for (var i = 0; i < len; i++) {
            var tem = resarr[i].split('=');
            if (tem[0] == k) {
                res = tem[1];
            }else{
                console.log('wait');
            }
        }
        return unescape(res);
    }
}

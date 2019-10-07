var ls={
    set:function(key,value,time){
        var res={
            date:value,
            time:new Date().getTime()+time,
        }
        localStorage.setItem(key,JSON.stringify(res));
    },
    get:function(key){
        var data=JSON.parse(localStorage.getItem(key));
        if(new Date().getTime()>data.time){
            localStorage.removeItem(key);
        }
        return data;
    },
    remove:function(){
        localStorage.clear();
        return null;
    },
};
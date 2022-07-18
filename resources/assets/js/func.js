window.addEvent = function(ele, type, handler) {
    if (ele.addEventListener) {
        ele.addEventListener(type, handler);
    } else if (ele.attachEvent) {
        /* 检查是否使IE浏览器 */
        ele.attachEvent("on" + type, handler);
    } else {
        ele["on" + type] = handler;
    }
};

window.getScrollTop = function(){
    var scrollTop=0
    if(document.documentElement&&document.documentElement.scrollTop){
        scrollTop = document.documentElement.scrollTop
    }else if(document.body){
        scrollTop = document.body.scrollTop
    }
    return scrollTop
};
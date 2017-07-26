
window.onload = function () {

    function $(id) {
        return document.getElementById(id);
    }

    function scroll() {
        if (window.pageYOffset != null)  //  ie9+ 和其他浏览器
        {
            return {
                left: window.pageXOffset,
                top: window.pageYOffset
            }
        }
        else if (document.compatMode == "CSS1Compat")  // 声明的了 DTD
        // 检测是不是怪异模式的浏览器 -- 就是没有 声明<!DOCTYPE html>
        {
            return {
                left: document.documentElement.scrollLeft,
                top: document.documentElement.scrollTop
            }
        }
        return { //  剩下的肯定是怪异模式的
            left: document.body.scrollLeft,
            top: document.body.scrollTop
        }
    }


    var pic = $("sidebar");
    var leader = 0;
    var target = 0;
    var timer = null;  // 定时器
    var top = pic.offsetTop;  // 50
    window.onscroll = function() {
        clearInterval(timer);
        target = scroll().top + top;  // 把最新的 scrolltop 给  target
        timer = setInterval(function() {
            leader = leader + (target - leader ) / 10;
            pic.style.top = leader + 'px';
        },30)
    }




};
/**
 * Created by Bonnenu on 2017/7/19.
 */
window.onload=function () {
    var width = $("img").width();
    var height = $('img').height();
    $("li").width(width).height(height);
    $("ul").width($("img").length*100+"%");
    slide();
    function slide() {
        $("ul").animate({
            left: '-=' + width
        }, 8000, function () {
            if ($(this).css("left") == -4*width+"px") {
                $(this).css("left",0);
            }
            slide();
        })
    }
};
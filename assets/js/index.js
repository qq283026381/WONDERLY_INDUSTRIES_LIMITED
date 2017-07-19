/**
 * Created by Bonnenu on 2017/7/19.
 */
window.onload=function () {
    var width = $("img").width();
    var height = $('img').height();
    $("li").width(width).height(height);
    slide();
    function slide() {
        $("ul").animate({
            left: '-=' + width
        }, 5000, function () {
            if ($(this).css("left") == -4800+"px") {
                $(this).css("left",0);
            }
            slide();
        })
    };
};
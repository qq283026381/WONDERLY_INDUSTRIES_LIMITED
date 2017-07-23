/**
 * Created by Bonnenu on 2017/7/23.
 */
window.onload=function () {
    initIframeHeight();
    $("li").mouseenter(function () {
        if($(this).children("ul")){
            $(this).children("ul").css("display","block");
        }
    }).mouseleave(function () {
        if($(this).children("ul")){
            $(this).children("ul").css("display","none");
        }
    })
};

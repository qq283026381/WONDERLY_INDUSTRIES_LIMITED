/**
 * Created by Bonnenu on 2017/7/23.
 */
window.onload = function () {
    initIframeHeight();
    setNavActive("product");
    categoryMove();
    $("li").mouseenter(function () {
        if ($(this).children("ul")) {
            $(this).children("ul").css("display", "block");
        }
    }).mouseleave(function () {
        if ($(this).children("ul")) {
            $(this).children("ul").css("display", "none");
        }
    })
};

function categoryMove() {
    var hHeight = $(".head").height();
    var nHeight = $(".nav").height();
    var height = hHeight + nHeight;
    $(window).scroll(function () {
        var scrollTop = $(document).scrollTop();
        if (scrollTop > height) {
            scrollTop -= height;
        } else {
            scrollTop = 0;
        }
        $(".left").stop().animate({"top": scrollTop}, 600);
    });
}
/**
 * Created by Bonnenu on 2017/7/19.
 */
showSlider();
window.onload = function () {
    initIframeHeight();
    setNavActive("home");
    var width = $("img").width();
    var height = $('img').height();
    $("li").width(width).height(height);
    $("ul").width($("img").length * 100 + "%");
    slide();
    function slide() {
        $("ul").animate({
            left: '-=' + width
        }, 8000, function () {
            if ($(this).css("left") === -4 * width + "px") {
                $(this).css("left", 0);
            }
            slide();
        })
    }
};
function showSlider() {
    var xmlhttp=returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("slider").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "util/ajax/getSlider.php", true);
    xmlhttp.send();
}
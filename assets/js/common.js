/**
 * Created by Bonnenu on 2017/7/18.
 */
function initIframeHeight() {
    var iframes = document.getElementsByTagName("iframe");
        for (var i = 0; i < iframes.length; i++) {
            var iframe = iframes[i];
            var bHeight = iframe.contentWindow.document.body.offsetHeight;
            iframe.style.height=bHeight+"px";
        }
}
function setNavActive(id) {
    var iframe = document.getElementsByClassName("nav")[0];
    var about = iframe.contentWindow.document.getElementById(id);
    about.setAttribute("class","active");
}